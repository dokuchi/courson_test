@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('titles.main.title') }}</div>

                    <div class="card-body">
                        Разработать веб-приложение "Телефонная книга":
                        <ul>
                            <li>приложение должно быть написано на Laravel;</li>
                            <li>должна быть регистрация, авторизация, восстановление пароля;</li>
                            <li>пользователь должен иметь возможность:</li>
                                <ul>
                                    <li>создавать, редактировать контакты (ФИО, номер телефона);</li>
                                    <li>просматривать список собственных контактов;</li>
                                    <li>просматривать контакт на отдельной странице;</li>
                                    <li>отмечать контакты как избранные;</li>
                                    <li>удалять контакты;</li>
                                    <li>должно быть api для crud контактов.</li>
                                </ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
