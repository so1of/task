@extends('layouts.app')

@section('title','Вход')

@section('content')
<div class="text-center">
    <main class="px-5 py-5 text-left min-vh-100 d-flex justify-content-center align-items-center">
        <div class="container col-md-6 col-12">
            <form action="{{ route('form-registration') }}" method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Введите данные</h1>
                <div class="form-floating mt-3">
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="floatingName" placeholder="Введите ваше имя">
                    <label for="floatingName">Введите ваше имя:</label>
                </div>
                @if ($errors->has('name'))
                    <div class="text-danger text-start"><p>{{ $errors->first('name') }}</p></div>
                @endif
                <div class="form-floating mt-3">
                    <input type="text" class="form-control"  value="{{ old('surname') }}" name="surname" id="floatingSurname" placeholder="Введите ваше имя">
                    <label for="floatingSurname">Введите вашу фамилию:</label>
                </div>
                @if ($errors->has('surname'))
                    <div class="text-danger text-start"><p>{{ $errors->first('surname') }}</p></div>
                @endif
                <div class="form-floating mt-3">
                    <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="floatinEmail" placeholder="Введите ваш email">
                    <label for="floatinEmail">Введите ваш email:</label>
                </div>
                @if ($errors->has('email'))
                    <div class="text-danger text-start"><p>{{ $errors->first('email') }}</p></div>
                @endif
                <div class="form-floating mt-3">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Введите ваш пароль">
                    <label for="floatingPassword">Введите ваш пароль:</label>
                </div>
                @if ($errors->has('password'))
                    <div class="text-danger text-start"><p>{{ $errors->first('password') }}</p></div>
                @endif
                <div class="form-floating mt-3">
                    <input type="password" class="form-control" name="password_confirmation" id="floatingPasswordConfirmation" placeholder="Повторите ваш пароль">
                    <label for="floatingPasswordConfirmation">Повторите ваш пароль:</label>
                </div>
                <div class="mt-3 d-flex">
                    <button class="w-100 btn btn-warning text-dark btn-lg" type="submit">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection