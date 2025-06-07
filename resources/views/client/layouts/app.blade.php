<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Cliente')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="/style/admin.css" rel="stylesheet">
    @yield('styles')
</head>
<body>

<!-- Botón hamburguesa -->
<button id="toggleSidebar" class="sidebar-toggle d-md-none" aria-expanded="false" aria-controls="sidebar">
    <i class="bi bi-list"></i>
</button>

<!-- Fondo oscuro cuando el sidebar está abierto -->
<div id="overlay" class="overlay" style="display: none;"></div>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-3 d-flex flex-column collapse" id="sidebar">
        <div class="user-info text-center mb-4">
            <i class="bi bi-person-circle display-4 text-white"></i>
            <h6 class="text-white mt-3 d-none d-md-block">{{ Auth::user()->name }}</h6>
        </div>      
        @include('client.layouts.menu')    
        <div class="divider mt-auto"></div>

        <form action="{{ route('client.logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-logout w-100">
                <i class="bi bi-box-arrow-right"></i> <span class="d-none d-md-inline">Cerrar sesión </span>
            </button>
        </form>
    </div>

    <!-- Área principal -->
    <div class="content-area fade-in p-4 flex-grow-1">
        <main class="mt-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            @yield('content')
        </main>
    </div>
</div>



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
<!-- Script de sidebar -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const icon = toggleButton.querySelector('i');

        const collapse = new bootstrap.Collapse(sidebar, {
            toggle: false
        });

        // Toggle sidebar al hacer clic
        toggleButton.addEventListener('click', function () {
            collapse.toggle();
        });

        // Cuando el sidebar se ha mostrado completamente
        sidebar.addEventListener('shown.bs.collapse', function () {
            overlay.style.display = 'block';
            toggleButton.classList.add('active');
            icon.classList.remove('bi-list');
            icon.classList.add('bi-x');
        });

        // Cuando el sidebar se ha ocultado completamente
        sidebar.addEventListener('hidden.bs.collapse', function () {
            overlay.style.display = 'none';
            toggleButton.classList.remove('active');
            icon.classList.remove('bi-x');
            icon.classList.add('bi-list');
        });

        // Cerrar sidebar al hacer clic en el overlay
        overlay.addEventListener('click', function () {
            collapse.hide();
        });
    });
</script>
@yield('scripts')
</body>
</html>
