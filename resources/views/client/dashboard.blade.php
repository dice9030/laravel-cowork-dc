@extends('client.layouts.app')

@section('content')

  <div class="container"> 
    <!-- Título con ícono -->
    <!-- Asegúrate de tener estas clases en tu CSS o en un <style> -->
    <h1 class="dashboard-title">
        <i class="fas fa-tachometer-alt dashboard-icon"></i>
        Dashboard
    </h1>


    <div class="row">
        <!-- Card 1 -->
        <div class="col-12 col-sm-6 col-lg-3 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-dollar-sign fa-2x text-success"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Ingresos</h6>
                        <h5 class="mb-0">$10,000</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-12 col-sm-6 col-lg-3 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-chart-line fa-2x text-primary"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Ventas</h6>
                        <h5 class="mb-0">$4,500</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-12 col-sm-6 col-lg-3 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-user-friends fa-2x text-warning"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Clientes</h6>
                        <h5 class="mb-0">350</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-12 col-sm-6 col-lg-3 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-box-open fa-2x text-danger"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Pedidos</h6>
                        <h5 class="mb-0">120</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <!-- Card: Productos Vendidos -->
    <div class="col-12 col-md-6 col-lg-4 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header d-flex align-items-center">
                <i class="fas fa-box-open me-2 text-primary"></i>
                <h6 class="mb-0">Productos Vendidos</h6>
            </div>
            <div class="card-body p-2">
                <table class="table table-sm table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Producto A</td>
                            <td>25</td>
                        </tr>
                        <tr>
                            <td>Producto B</td>
                            <td>15</td>
                        </tr>
                        <tr>
                            <td>Producto C</td>
                            <td>30</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Card: Últimas Ventas -->
    <div class="col-12 col-md-6 col-lg-4 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header d-flex align-items-center">
                <i class="fas fa-receipt me-2 text-success"></i>
                <h6 class="mb-0">Últimas Ventas</h6>
            </div>
            <div class="card-body p-2">
                <table class="table table-sm table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Juan Pérez</td>
                            <td>$120.00</td>
                        </tr>
                        <tr>
                            <td>Ana López</td>
                            <td>$85.50</td>
                        </tr>
                        <tr>
                            <td>Mario Ruiz</td>
                            <td>$230.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Card: Productos Recientes -->
    <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header d-flex align-items-center">
                    <i class="fas fa-plus-circle me-2 text-warning"></i>
                    <h6 class="mb-0">Productos Recientes</h6>
                </div>
                <div class="card-body p-2">
                    <table class="table table-sm table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Producto X</td>
                                <td>06/06/2025</td>
                            </tr>
                            <tr>
                                <td>Producto Y</td>
                                <td>05/06/2025</td>
                            </tr>
                            <tr>
                                <td>Producto Z</td>
                                <td>04/06/2025</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    
</div>


  
@endsection

@section('styles')

<style>
    .dashboard-title {
        font-size: 2.5rem;
        color: #2c3e50;
        font-weight: bold;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
    }

    .dashboard-icon {
        color: #2c3e50;
        margin-right: 10px;
    }

    .card {
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-10px);
    }
    
    
  
</style>

@endsection