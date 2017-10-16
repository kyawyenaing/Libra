<div class="col-md-10 col-md-offset-1 col-md-outset-1">
    <div class="panel panel-default">
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav">
            <!-- Authentication Links -->
            @if( Auth::user()->is_admin )
            <li><a href="{{ url('/admin/books') }}">Books</a></li>
            <li><a href="{{ url('/admin/members') }}">Members</a></li>
            <li><a href="{{ url('/admin/report') }}">Report</a></li>
            @else
            <li><a href="{{ url('/member/books/search') }}">Search Books</a></li>
            <li><a href="{{ url('/member/books') }}">Borrowed Books</a></li>
            @endif
            </ul>
        </div>
    </div>
</div>
