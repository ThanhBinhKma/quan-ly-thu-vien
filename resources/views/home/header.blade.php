<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <!-- SEARCH FORM -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
{{--                <span class="badge badge-danger navbar-badge">3</span>--}}
            </a>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
{{--                <span class="badge badge-warning navbar-badge">15</span>--}}
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('user.logout')}}">
               Logout
            </a>
        </li>
    </ul>
</nav>
