@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('titles.contacts.main', ['username' => Auth::user()->name]) }}</div>

                    <div class="card-body">
{{--                                            @dd($contacts)--}}
                        <ul>
                            @foreach($contacts as $contact)
{{--                                @dd($contact->favoriteContactForUsers->count() > 0)--}}
                                <li>
                                    <form action="{{ route('contacts.destroy',[$contact->id]) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button title="{{ __('titles.contacts.button.del') }}">X</button>
                                        <a @if($contact->favoriteContactForUsers->count() > 0) style="background-color: #fff6a1" @endif
                                           href="{{route('contacts.edit',[$contact->id])}}"
                                        >
                                            {{ $contact->fio }} - {{ $contact->phone }}
                                        </a>
                                    </form>
                                    {{--                        <form action="{{ route('favoriteContacts.add', [$contact->id]) }}" method="POST">--}}
                                    {{--                            <button>{{ __('titles.contacts.button.add_favorite') }}</button>--}}
                                    {{--                        </form>--}}
                                </li>
                            @endforeach
                        </ul>
                        <form action="{{ route('contacts.create') }}" method="GET">
                            <button>{{ __('titles.contacts.button.add') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
