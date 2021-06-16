@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('titles.contacts.create', ['username' => Auth::user()->name]) }}</div>
                    <div class="card-body">
                        <form action="{{ route('contacts.store') }}" method="POST">
                            @csrf
                            <div>
                                <label for="fio">{{ __('titles.contacts.label.fio') }}:</label>
                                <input id="fio" type="text" name="fio" value="">
                            </div>
                            <div>
                                <label for="phone">{{ __('titles.contacts.label.phone') }}:</label>
                                <input id="phone" type="text" name="phone" value="">
                            </div>
                            <div>
                                <label for="favorite">{{ __('titles.contacts.label.in_favorite') }}</label>
                                <input id="favorite" type="checkbox" name="favorite">
                            </div>
                            <div>
                                <button>{{ __('titles.contacts.button.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
