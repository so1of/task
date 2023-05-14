<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{ route('task.index') }}" class="nav-link px-2 link-dark">Задания</a></li>
        <li><a href="{{ route('task.create') }}" class="nav-link px-2 link-dark">Добавить задание</a></li>
    </ul>
    <div class="col-md-3 text-end">
        <a href="{{ route('logout') }}" class="btn btn-outline-warning me-2 text-dark">Выход</a>
    </div>
</header>