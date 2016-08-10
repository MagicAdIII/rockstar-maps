<nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="navbar-header">
    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        <li><a href="{{ url('/') }}">Home</a></li>
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
        @else
            <li><a href="#">Hi, {{ Auth::user()->username }}</a></li>
            <li>
                <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            @if (Auth::user()->isAdmin())
                <li><a href="{{ route('roles.index') }}">Roles</a></li>
                <li><a href="{{ route('users.index') }}">Users</a></li>
                <li><a href="{{ route('games.index') }}">Games</a></li>
                <li><a href="{{ route('markers.index') }}">Markers</a></li>
                <li><a href="{{ route('markergroups.index') }}">MarkerGroups</a></li>
            @endif
        @endif
    </ul>
    </div>


</nav>
