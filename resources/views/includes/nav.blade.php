<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="/" class="navbar-brand"><i class="fas fa-home"></i></a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="{{ route('users')}}" class="nav-item nav-link active">Members</a>
            <a href="{{ route('tutorials')}}" class="nav-item nav-link">Tutorials</a>
            <a href="{{ route('blog') }}" class="nav-item nav-link">Blog</a>
        </div>
        <form class="form-inline ml-auto">
            <input type="text" class="form-control mr-sm-2" placeholder="Search">
            <button type="submit" class="btn btn-outline-light">Search</button>
        </form>

        <a class="item" href="{{route('login')}}"><i class='fas fa-user-lock p-2' style='color: #CCE2FF;'></i></a>
    </div>
</nav>
