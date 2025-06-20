<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Todolist</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            @if(Auth::user())
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" aria-current="page" data-bs-toggle="dropdown"
                               href="{{url('task')}}">Задачи</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{url('task')}}">Все задачи</a></li>
                                <li><a class="dropdown-item" href="{{url('task/create')}}">Добавить задачу</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav">
                    <a class="nav-link active" href="#"><i class="fa fa-user" style="font-size:20px;color:white;"></i>
                        <span>{{ Auth::user()->name }}</span></a>
                    <a class="btn btn-outline-success my-2 my-sm-0" href="{{url('logout')}}">Выйти</a>
                </ul>
            @endif
        </div>
    </nav>
</header>
