<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.bunny.net"> -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css" rel="stylesheet">

    <!-- Include jQuery before DataTables -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>

    <style>
        #offcanvasNavbar {
            width: 16%;
        }

        @media (max-width: 768px) {
            #offcanvasNavbar {
                width: 80%;
            }
        }

        .navbar, #offcanvasNavbar {
            background-color: #ffffff; 
        }

        .btn.btn-primary {
            background-color: #727CF5;
            border-color: #727CF5;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color:#eeeeee">
    <div id="app">
        <nav class="navbar fixed top shadow-sm text-bg-white">
            <div class="container-fluid">
                @guest
                    @if (Route::has('login'))
                        <a href="#" class="navbar-brand">IT Inventory</a>
                    @endif
                @else
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    @if (Auth::user()->role === 'user')
                        <a href="{{ route('admin.dashboard') }}" class="navbar-brand">IT Inventory</a>
                        @else
                        <div class="d-flex justify-content-end">
                            <div class="dropdown navbar-brand">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="dropdown-item">Account details</a></li>
                                    <li><a href="#" class="dropdown-item">Change password</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset('image/IT-white.webp') }}" alt="IT-Logo" class="img-fluid" style="width:100px">
                            <div class="fs-3 mt-2">IT Inventory</div>
                        </div>
                    </div>
                    <hr>
                    <div class="offcanvas-body">
                        @if (Auth::user()->role === 'admin')
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="side-nav-title mb-3">Navigation</li>
                                <li class="nav-item fs-5 {{ Request::is('admin.dashboard') ? 'active' : '' }}">
                                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                        <i class="fa-solid fa-chart-line mx-3"></i> Dashboard
                                    </a>
                                </li>
                                <li class="nav-item fs-5 {{ Request::is('admin.inventory.index') ? 'active' : '' }}">
                                    <a href="{{ route('admin.inventory.index') }}" class="nav-link">
                                        <i class="fa-solid fa-boxes-stacked mx-3"></i> Inventory
                                    </a>
                                </li>
                                <li class="nav-item fs-5">
                                    <a href="#" class="nav-link">
                                        <i class="fa-solid fa-file-excel mx-3"></i></i> Report
                                    </a>
                                </li>
                                <li class="nav-item fs-5">
                                    <a href="#" class="nav-link">
                                        <i class="fa-solid fa-user mx-3"></i> Accounts
                                    </a>
                                </li>
                                <hr>
                                <li class="side-nav-title mb-3">CMS</li>
                                <li class="nav-item fs-5 {{ Request::is('admin.department.index') ? 'active' : '' }}">
                                    <a href="{{ route('admin.department.index') }}" class="nav-link">
                                        <i class="fa-solid fa-building mx-3"></i> Department
                                    </a>
                                </li>
                                <li class="nav-item fs-5 {{ Request::is('admin.unit.index') ? 'active' : '' }}">
                                    <a href="{{ route('admin.unit.index') }}" class="nav-link">
                                        <i class="fa-solid fa-weight-scale mx-3"></i> Unit
                                    </a>
                                </li>
                                <li class="nav-item fs-5 {{ Request::is('admin.equipment.index') ? 'active' : '' }}">
                                    <a href="{{ route('admin.equipment.index') }}" class="nav-link">
                                        <i class="fa-solid fa-laptop mx-3"></i> Equipment
                                    </a>
                                </li>
                                <hr>
                            </ul>
                            @else
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="side-nav-title mb-3">Navigation</li>
                                <li class="nav-item fs-5 {{ Request::is('admin.dashboard') ? 'active' : '' }}">
                                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                        <i class="fa-solid fa-chart-line mx-3"></i> Dashboard
                                    </a>
                                </li>
                                <li class="nav-item fs-5 {{ Request::is('admin.inventory.index') ? 'active' : '' }}">
                                    <a href="{{ route('admin.inventory.index') }}" class="nav-link">
                                        <i class="fa-solid fa-boxes-stacked mx-3"></i> Inventory
                                    </a>
                                </li>
                                <li class="nav-item fs-5">
                                    <a href="#" class="nav-link">
                                        <i class="fa-solid fa-file-excel mx-3"></i></i> Report
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
                @endguest
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>
</html>
