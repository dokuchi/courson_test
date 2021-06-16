@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('titles.contacts.edit', ['username' => Auth::user()->name]) }}</div>

                    <div class="card-body">

                        <form action="{{ route('contacts.update', [$contact->id]) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <div>
                                <label for="fio">{{ __('titles.contacts.label.fio') }}:</label>
                                <input id="fio" type="text" name="fio" value="{{ $contact->fio }}">
                            </div>
                            <div>
                                <label for="phone">{{ __('titles.contacts.label.phone') }}:</label>
                                <input id="phone" type="text" name="phone" value="{{ $contact->phone }}">
                            </div>
                            <div>
                                <label for="favorite">{{ __('titles.contacts.label.in_favorite') }}</label>
                                <input id="favorite" type="checkbox" name="favorite" @if($contact->favoriteContactForUsers->count() > 0) checked @endif >
                            </div>
                            <div>
                                <button>{{ __('titles.contacts.button.save') }}</button>
                            </div>
                        </form>
                        <form style="margin-top: 5px" action="{{ route('contacts.destroy',[$contact->id]) }}"
                              method="POST">
                            @csrf
                            @method("DELETE")
                            <button style="background-color: red">{{ __('titles.contacts.button.del') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
