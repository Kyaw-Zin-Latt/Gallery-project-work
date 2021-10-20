<nav class="main-header navbar navbar-expand border-bottom">

    <!-- Left navbar links -->
    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>

        <!-- Brand Logo -->

        <span class="brand-text">
          Dashboard
            </span>

    </ul>
    <ul class="navbar-nav ml-auto">


        <li class="user user-menu">
            <a href="{{ route("profile.edit") }}" class="d-block">
                <img src="{{ empty(Auth::user()->photo)  ? asset('dashboard/img/default.jpg') : asset('storage/profile/'.Auth::user()->photo) }}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
        </li>

        <li class="messages-menu open" style="padding-left: 30px;">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out" style="font-size: 1.5em; color: #000;"></i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </li>

    </ul>
</nav>
