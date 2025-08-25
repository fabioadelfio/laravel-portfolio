<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="d-flex">
        {{-- Sidebar --}}
        <nav class="bg-dark text-white p-3" style="width: 200px;">
            <h4>Admin</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link text-white">Dashboard</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Progetti</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Logout</a></li>
            </ul>
        </nav>

        {{-- Contenuto --}}
        <main class="p-4 flex-grow-1">
            @yield('content')
        </main>
    </div>
</body>

</html>