<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Roboto', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background: linear-gradient(to right, #fef3c7, #fdc56d);
        }

        .navbar-nav .nav-link {
            font-size: 0.875rem; 
            font-weight: 400; /* Menos negrita */
            color: #333;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #ff6347; /* Color al pasar el cursor */
        }

        footer {
            background: linear-gradient(to right, #fef3c7, #fdc56d);
            padding: 15px 0;
            font-size: 0.75rem;
            text-align: center;
            bottom: 0;
            width: 100%;
            color: #333;
        }

        footer a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s;
        }

        footer a:hover {
            color: #ff6347; 
        }

        footer p {
            margin: 0;
        }

        .carousel-item img {
            width: 100%;
            height: 500px; 
            object-fit: cover;
        }

        .section-content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .section-content h1 {
            font-size: 1.5rem; 
            color: #333;
        }

        .section-content p {
            font-size: 0.875rem; 
            color: #666;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        .card h2 {
            font-size: 1.25rem; 
            color: #333;
        }

        .card p {
            font-size: 0.875rem; 
            color: #666;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{ route('welcome') }}">Cerámicos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">Acerca de Nosotros</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                           Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @auth
            <h1>Bienvenido, {{ Auth::user()->name }}</h1>
        @else
            <h1>Bienvenido a Rincón de Cerámica</h1>
        @endauth

        <div id="ceramicsCarousel" class="carousel slide mt-4" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('storage/images/ceramica-1.jpg') }}" alt="Cerámico 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/images/vasija_iznik.jpg') }}" alt="Cerámico 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/images/vasija_china.jpg') }}" alt="Cerámico 3">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/images/taza2.jpg') }}" alt="Cerámico 4">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/images/taza3.jpg') }}" alt="Cerámico 5">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/images/taza4.jpg') }}" alt="Cerámico 6">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/images/vasija_iznik2.jpg') }}" alt="Cerámico 7">
                </div>
            </div>
            <a class="carousel-control-prev" href="#ceramicsCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#ceramicsCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="section-content mt-5">
            <div class="container">
                <h1 class="text-center mb-4">¿Por qué elegirnos?</h1>
                <p class="text-center mb-4">En Rincón de Cerámica, nos enorgullece ofrecer productos cerámicos de alta calidad que fusionan tradición y diseño contemporáneo. Fundada en 2024, nuestra misión es proporcionar piezas únicas que no solo cumplan, sino que superen tus expectativas.</p>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <h2>Experiencia</h2>
                            <p>Cada artículo es el resultado de técnicas artesanales ancestrales combinadas con un enfoque moderno, garantizando durabilidad y elegancia.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <h2>Compromiso</h2>
                            <p>Nuestra amplia gama de productos, desde vajillas y utensilios de cocina hasta decoraciones y regalos, está elaborada con un compromiso absoluto hacia la excelencia.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <h2>Explorar</h2>
                            <p>Ven a visitarnos en Buenos Aires o explora nuestras colecciones online para descubrir cómo nuestra cerámica puede añadir un toque especial a tu hogar.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Rincón de Cerámica</p>
        <p>
            <a href="{{ route('welcome') }}">Inicio</a> |
            <a href="{{ route('products.index') }}">Productos</a> |
            <a href="{{ route('contact') }}">Contacto</a> |
            <a href="{{ route('about') }}">Acerca de Nosotros</a>
        </p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
