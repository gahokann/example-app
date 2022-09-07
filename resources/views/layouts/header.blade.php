<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">CRUD</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{ route('todos.index') }}" class="nav-link @yield('active')">Задачи</a></li>
        <li class="nav-item" style="margin-left: 15px"><a href="{{ route('developer.index') }}" class="nav-link @yield('active')">Разработчики</a></li>
      </ul>
    </header>
  </div>

  