@extends('layouts.app')

@section('title','Добавить')

@section('content')
    @include('inc.header')
    <div class="min-vh-100">
        <main>
            <div class="container-left col-6 px-3 py-3 ms-5 mt-5">
                <h3 class="text-dark">Добавить новое задание</h3>
                <form action="{{ route('task.store') }}" method="post">
                    @csrf

                    <div class="form-floating mt-3">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Введите название задания" id="floatingName" class="form-control" required>
                        <label for="floatingName">Введите название задания:</label>
                    </div>
                    <div class="form-group mt-3">
                        <label>Ваше описание задания:</label>
                        <textarea name="description" id="description" class="form-control" style="height: 130px;" required></textarea>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="date" name="dateEnd" placeholder="Введите дату желательного завершения" id="floatingDateEnd" class="form-control" required>
                        <label for="floatingDateEnd">Введите дату желательного завершения:</label>
                    </div>
                    @if ($errors->has('dateEnd'))
                    <div class="text-danger text-start"><p>{{ $errors->first('dateEnd') }}</p></div>
                    @endif
                    <button type="submit" class="btn btn-success mt-3">Добавить</button>
                </form>
            </div>
        </main>
    </div>
    @include('inc.footer')
@endsection