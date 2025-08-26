<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="bg-dark text-white vh-100 p-3" style="width: 240px;">
            <h3 class="fs-4 mb-4">Admin</h3>
            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active bg-secondary text-white' : 'text-light' }}">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.projects.index') }}"
                        class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active bg-secondary text-white' : 'text-light' }}">
                        <i class="bi bi-folder me-2"></i> Progetti
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link text-light">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>
</body>

</html>