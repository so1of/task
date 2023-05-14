@extends('layouts.app')

@section('title','Вход')

@section('content')
<div class="text-center">
    <main class="px-5 py-5 text-left min-vh-100 d-flex justify-content-center align-items-center">
        <div class="container col-md-5 col-12">
            <form action="#" method="post">
                @csrf
                @if ($errors->has('email'))
                    <div class="text-danger"><h3>{{ $errors->first('email') }}</h3></div>
                @else
                <h1 class="h3 mb-3 fw-normal">Введите данные</h1>
                @endif
                <div class="form-floating mt-3">
                    <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Введите ваш email:</label>
                </div>
                <div class="form-floating mt-3">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Введите ваш пароль:</label>
                </div>
                <div class="checkbox mt-3 text-start">
                    <label>
                        <input type="checkbox" value="remember-me"> Запомнить меня
                    </label>
                </div>
                <div class="mt-3 d-flex">
                    <button class="w-50 btn btn-warning text-dark btn-lg me-2" type="submit"><a href="{{ route('registration') }}" class="nav-link">Зарегистрироваться</a></button>
                    <button class="w-50 btn btn-outline-warning text-dark btn-lg ms-2" type="submit">Войти</button>
                </div>
            </form>
        </div>
    </main>
</div>

@endsection