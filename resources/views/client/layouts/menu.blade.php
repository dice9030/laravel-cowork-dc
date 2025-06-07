        <a href="{{ route('client.dashboard') }}"
        class="sidebar-link {{ request()->routeIs('client.dashboard') ? 'active' : '' }}">
            <i class="bi bi-house-door"></i> <span class="d-none d-md-inline">Dashboard</span>
        </a>

         @php
            $productoActivo = request()->routeIs('reservas.mias') || request()->is('configuracion*');
        @endphp

        <!-- Grupo de Producto con estilo y estado activo -->
        <a class="sidebar-link d-flex justify-content-between align-items-center {{ $productoActivo ? 'active' : '' }}" 
        data-bs-toggle="collapse" href="#productoMenu" role="button" aria-expanded="{{ $productoActivo ? 'true' : 'false' }}" aria-controls="productoMenu">
            <div>
                <i class="bi bi-people"></i> <span class="d-none d-md-inline">Entidad</span>
            </div>
            <i class="bi bi-chevron-down toggle-icon d-none d-md-inline"></i>
        </a>

        <div class="collapse ps-3 producto-submenu {{ $productoActivo ? 'show' : '' }}" id="productoMenu">
            <a href="{{ route('reservas.mias') }}" class="sidebar-link {{ request()->routeIs('reservas.mias') ? 'active' : '' }}">
                <i class="bi bi-person"></i> <span class="d-none d-md-inline">Proveedores</span>
            </a>

            <a href="#" class="sidebar-link {{ request()->is('configuracion*') ? 'active' : '' }}">
                <i class="bi bi-person-workspace"></i> <span class="d-none d-md-inline">Clientes</span>
            </a>           
        </div>
        
        {{-- @php
            $productoActivo = request()->routeIs('reservas.mias') || request()->is('configuracion*');
        @endphp

        <!-- Grupo de Producto con estilo y estado activo -->
        <a class="sidebar-link d-flex justify-content-between align-items-center {{ $productoActivo ? 'active' : '' }}" 
        data-bs-toggle="collapse" href="#productoMenu" role="button" aria-expanded="{{ $productoActivo ? 'true' : 'false' }}" aria-controls="productoMenu">
            <div>
                <i class="bi bi-box"></i> <span class="d-none d-md-inline">Producto</span>
            </div>
            <i class="bi bi-chevron-down toggle-icon d-none d-md-inline"></i>
        </a>

        <div class="collapse ps-3 producto-submenu {{ $productoActivo ? 'show' : '' }}" id="productoMenu">
            <a href="{{ route('reservas.mias') }}" class="sidebar-link {{ request()->routeIs('reservas.mias') ? 'active' : '' }}">
                <i class="bi bi-book"></i> <span class="d-none d-md-inline">Reservas</span>
            </a>

            <a href="#" class="sidebar-link {{ request()->is('configuracion*') ? 'active' : '' }}">
                <i class="bi bi-gear"></i> <span class="d-none d-md-inline">Configuración</span>
            </a>
             <a href="#" class="sidebar-link {{ request()->is('configuracion*') ? 'active' : '' }}">
                <i class="bi bi-gear"></i> <span class="d-none d-md-inline">Configuración</span>
            </a>
             <a href="#" class="sidebar-link {{ request()->is('configuracion*') ? 'active' : '' }}">
                <i class="bi bi-gear"></i> <span class="d-none d-md-inline">Configuración</span>
            </a>
             <a href="#" class="sidebar-link {{ request()->is('configuracion*') ? 'active' : '' }}">
                <i class="bi bi-gear"></i> <span class="d-none d-md-inline">Configuración</span>
            </a>
        </div> --}}