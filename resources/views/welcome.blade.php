<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coworking Spaces</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      font-family: 'Nunito', sans-serif;
      scroll-behavior: smooth;
    }

    .navbar {
      position: absolute;
      top: 20px;
      left: 0;
      right: 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 30px;
      z-index: 10;
    }

    .logo {
      color: white;
      font-size: 1.5rem;
      font-weight: bold;
      background-color: rgba(0, 0, 0, 0.6);
      padding: 8px 15px;
      border-radius: 6px;
    }

    .navbar-links a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      margin-left: 20px;
      background-color: rgba(0, 0, 0, 0.6);
      padding: 10px 20px;
      border-radius: 6px;
      transition: background 0.3s ease;
    }

    .navbar-links a:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }

    .parallax {
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      color: white;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.8);
    }

    .parallax-content {
      text-align: center;
      padding: 20px;
      background-color: rgba(0, 0, 0, 0.5);
      border-radius: 10px;
    }

    .parallax h1 {
      font-size: 3rem;
      margin-bottom: 15px;
    }

    .parallax p {
      font-size: 1.25rem;
      margin-bottom: 20px;
    }

    .cta {
      background-color: #ef3b2d;
      color: white;
      padding: 15px 30px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s ease;
    }

    .cta:hover {
      background-color: #c53030;
    }

    .section {
      padding: 60px 20px;
      text-align: center;
    }

    .section h2 {
      font-size: 2.5rem;
      margin-bottom: 20px;
      color: #1a202c;
    }

    .section p {
      max-width: 800px;
      margin: 0 auto;
      color: #4a5568;
      font-size: 1.1rem;
    }

     .gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    margin-top: 40px;
  }

  .gallery img {
    width: 300px;
    height: 200px;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
  }

  .gallery img:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(0,0,0,0.2);
  }

    footer {
      background-color: #1a202c;
      color: white;
      text-align: center;
      padding: 20px;
    }
  </style>
</head>
<body>

 <div class="parallax" style="background-image: url('https://images.unsplash.com/photo-1527192491265-7e15c55b1ed2?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
      <div class="navbar">
          <div class="logo">CoworkingDC</div>
          <div class="navbar-links">
              @guest
                  <a href="/client/register">Registrarse</a>
                  <a href="/client/login">Iniciar Sesión</a>
              @else
                  <a href="/client/dashboard">Dashboard</a>
                  <form action="{{ route('client.logout') }}" method="POST" style="display:inline;">
                      @csrf
                      <button type="submit" style="background: none; border: none; color: white; cursor: pointer;">Cerrar sesión</button>
                  </form>
              @endguest
          </div>
      </div>
      <div class="parallax-content">
          <h1>Espacios de Coworking</h1>
          <p>Reserva tu sala ideal para trabajar, reunirte o crear.</p>
          <a href="#servicios" class="cta">Explorar Salas</a>
      </div>
  </div>

 <section class="section" id="servicios">
  <h2>¿Qué ofrecemos?</h2>
  <p>Desde oficinas privadas hasta salas de juntas y áreas compartidas, contamos con múltiples opciones para adaptarnos a tus necesidades profesionales.</p>

  <div class="gallery">
    <img src="https://images.unsplash.com/photo-1713946598691-173f44f13dc9?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Oficina privada">
    <img src="https://plus.unsplash.com/premium_photo-1677529494239-682591edd525?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Sala de juntas">
    <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Área compartida">
  </div>
</section>

  <div class="parallax" style="background-image: url('https://images.unsplash.com/photo-1523908511403-7fc7b25592f4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
    <div class="parallax-content">
      <h2>Ambientes Modernos</h2>
    </div>
  </div>

  <section class="section">
    <h2>Reserva Online</h2>
    <p>Gestiona tus espacios de trabajo fácilmente desde nuestra plataforma. Selecciona el día, la hora y la sala que mejor se adapte a tu agenda.</p>
  </section>

  <div class="parallax" style="background-image: url('https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');">
    <div class="parallax-content">
      <h2>Conecta y Colabora</h2>
    </div>
  </div>

  <footer>
    © 2025 Coworking Spaces. Todos los derechos reservados.
  </footer>

</body>
</html>
