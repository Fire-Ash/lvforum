@php
$nav_items = [
    '<a href="/"><i class="fa-solid fa-house-chimney"></i> Home</a>',
    '<a href="/users"><i class="fa-solid fa-users"></i> Users</a>',
    '<a href="/stats"><i class="fa-solid fa-chart-simple"></i> Stats</a>'
]
@endphp

<div class="navbar sticky top-0 z-50 backdrop-blur">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
            </label>
            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                @foreach($nav_items as $item)
                    <li>{!! $item !!}</li>
                @endforeach
            </ul>
        </div>
        <a href="/" class="btn btn-ghost normal-case text-xl">{{ env('APP_NAME') }}</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal p-0">
            @foreach($nav_items as $item)
                <li>{!! $item !!}</li>
            @endforeach
        </ul>
    </div>
    <div class="navbar-end">
        @auth
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost normal-case"><i class="fa-solid fa-user mr-2"></i> {{ auth()->user()->username }}</label>
                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="/users/{{ auth()->user()->id }}/profile"><i class="fa-solid fa-user fa-fw"></i> Profile</a></li>
                    <li><a href="/settings"><i class="fa-solid fa-gears fa-fw"></i> Settings</a></li>
                    @if(auth()->user()->role <= 1)
                        <li><a href="/admin/panel"><i class="fa-solid fa-gavel fa-fw"></i> Admin Panel</a></li>
                    @endif
                    <form method="POST" action="/logout">
                        @csrf
                        <li><button type="submit"><i class="fa-solid fa-right-from-bracket fa-fw"></i> Logout</button></li>
                    </form>
                </ul>
            </div>
        @else
            <span class="sm:space-x-1">
                <a href="/login" class="btn btn-outline btn-secondary">
                    <i class="fa-solid fa-right-to-bracket sm:mr-2"></i><span class="hidden sm:flex"> Login</span>
                </a>
                <a href="/register" class="btn btn-primary"><i class="fa-solid fa-user-plus mr-2"></i> Register</a>
            </span>
        @endauth
    </div>
</div>
