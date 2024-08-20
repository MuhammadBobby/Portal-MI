<nav>
    <i class='bx bx-menu'></i>
    <a href="/news" class="nav-link">All News</a>
    <form action="/admin/search" method="GET">
        @csrf
        <div class="form-input">
            <input type="search" placeholder="Search news title..." name="search">
            <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
        </div>
    </form>
    <input type="checkbox" id="switch-mode" class="hidden">
    <label for="switch-mode" class="switch-mode"></label>
    <a href="/profile" class="profile">
        @if (Auth::user()->google_id == null)
            <img src="/uploads/users/{{ Auth::user()->image }}">
        @else
            <img src="{{ Auth::user()->image }}">
        @endif
    </a>
</nav>
