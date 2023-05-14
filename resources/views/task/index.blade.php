@extends('layouts.app')

@section('title','Вход')

@section('content')
@include('inc.header')
    <div class="min-vh-100">
        <main>
            <h2>Список задач:</h2>
            <div class="row">
                <div class="col-8 text-center g-5 p-0">
                    @foreach($plan as $plans)
                        <div class="d-flex">
                            <div class="col-1 mt-2">
                                @if( $plans['token'] == 'token')
                                <i class="bi bi-circle fs-2 col-1"></i>
                                @else
                                <i class="bi bi-check-circle fs-2 col-1"></i>
                                @endif
                            </div>
                            <div class="container bg-task mb-5 col-11">
                                @if( $plans['token'] == 'token')
                                <h4 class="text-start col-12">{{ $plans['name'] }}</h4>
                                <pre class="text-start text-wrap text-task text-task">{{ $plans['text'] }}</pre>
                                @else
                                <h4 class="text-start col-12 text-decoration">{{ $plans['name'] }}</h4>
                                <pre class="text-start text-wrap text-task text-decoration text-task">{{ $plans['text'] }}</pre>
                                @endif
                                <div class="d-flex">
                                    <div class="col-6">
                                        @if( $plans['token'] == 'token')
                                        <form action="{{ route('task.update', $plans['id']) }}" class="d-inline-block" method="post">
                                            @csrf
                                            @method('put')
                                            <button  type="submit" class="btn btn-success px-4 btn-sm" onclick="return confirm('Подтвердите выполнение')">
                                            Выполнено
                                            </button>
                                        </form>
                                        <form action="{{ route('task.destroy', $plans['id']) }}" class="d-inline-block" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button  type="submit" class="btn btn-danger px-4 btn-sm" onclick="return confirm('Подтвердите удаление')">
                                                Удалить
                                            </button>
                                        </form>
                                        @else
                                        <form action="{{ route('task.destroy', $plans['id']) }}" class="d-inline-block" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button  type="submit" class="btn btn-danger px-4 btn-sm" onclick="return confirm('Подтвердите удаление')">
                                                Удалить
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                    @if( $plans['token'] == 'token')
                                    <p class="text-center col-6 justify-content-center align-items-center mt-2 text-task">Дата завершения задачи {{ $plans['data_end'] }}</p>
                                    @else
                                    <p class="text-center col-6 justify-content-center align-items-center mt-2 text-task text-decoration">Дата завершения задачи {{ $plans['data_end'] }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
    @include('inc.footer')
@endsection