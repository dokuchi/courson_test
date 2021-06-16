<?php

namespace App\Http\Controllers\PhoneBook;

use App\Http\Requests\ContactUpdateStoreRequest;
use App\Models\Contact;
use Auth;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Auth::user()
            ->contacts()
            ->get()
            ->sortBy('fio');

        if($request->expectsJson()) {
            return response()->json($contacts);
        }
        return response()->view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->expectsJson()) {
            return response()->json([],400);
        }
        return response()->view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactUpdateStoreRequest $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(ContactUpdateStoreRequest $request)
    {
        $contact = new Contact;
        $contact->fill($request->validated());
        $contact->owner_id = Auth::user()->id;
        $contact->save();

        if(array_key_exists('favorite', $request->validated())){
            $request->user()->favoriteContacts()->syncWithoutDetaching($contact->id);
        }

        if($request->expectsJson()) {
            return response()->json(['status'=>'success', 'contact'=>$contact]);
        }
        return redirect()->route('contacts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $contact
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function edit(Contact $contact, Request $request)
    {
        if($request->expectsJson()) {
            return response()->json($contact);
        }
        return response()->view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Contact $contact
     * @param ContactUpdateStoreRequest $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(Contact $contact, ContactUpdateStoreRequest $request)
    {
        $contact->fill($request->validated());
        $contact->save();
        if(array_key_exists('favorite', $request->validated())){
            Auth::user()->favoriteContacts()->syncWithoutDetaching($contact->id);
        } else {
            Auth::user()->favoriteContacts()->detach($contact->id);
        }

        if($request->expectsJson()) {
            return response()->json(['status'=>'success', 'contact'=>$contact]);
        }
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Contact $contact, Request $request)
    {
        Auth::user()->favoriteContacts()->detach($contact->id);
        $contact->delete();
        if ($request->expectsJson()) {
            return response()->json(['status' => 'success']);
        }
        return redirect()->route('contacts.index');
    }
}
