<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar-nav .nav-item:hover {
            background-color: #f8f9fa;
        }
        .carousel-item img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }
        body {
            background-color: burlywood;
            font-family: 'Roboto', sans-serif;
        }

        .navbar-nav .nav-link {
            font-size: 2em;
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
            color: black;
            transition: color 0.3s, text-shadow 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #ff6347;
            text-shadow: 0 0 5px rgba(255, 99, 71, 0.75); /* Efecto luminoso */
        }

        footer {
            background-color: #f8f9fa;
            padding: 10px 0;
            font-size: 14px;
            text-align: center;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: black;
            text-decoration: none;
            transition: color 0.3s, text-shadow 0.3s;
        }

        footer a:hover {
            color: #ff6347; /* Cambia este color según prefieras */
            text-shadow: 0 0 5px rgba(255, 99, 71, 0.75); /* Efecto luminoso */
        }

        footer p {
            margin: 0;
            font-size: 12px;
        }
        a{
            font-size: 21px;
        }
        footer p{
            font-size: 21px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo e(route('welcome')); ?>">Cerámicos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('welcome')); ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('products.index')); ?>">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('contact')); ?>">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('about')); ?>">Acerca de Nosotros</a>
                </li>
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                           Logout
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <?php if(auth()->guard()->check()): ?>
            <h1>Bienvenido, <?php echo e(Auth::user()->name); ?></h1>
        <?php else: ?>
            <h1>Bienvenido a Rincón de Cerámica</h1>
        <?php endif; ?>

        <div id="ceramicsCarousel" class="carousel slide mt-4" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo e(asset('storage/images/ceramica-1.jpg')); ?>" alt="Cerámico 1">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo e(asset('storage/images/vasija_iznik.jpg')); ?>" alt="Cerámico 2">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo e(asset('storage/images/vasija_china.jpg')); ?>" alt="Cerámico 3">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo e(asset('storage/images/taza2.jpg')); ?>" alt="Cerámico 3">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo e(asset('storage/images/taza3.jpg')); ?>" alt="Cerámico 3">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo e(asset('storage/images/taza4.jpg')); ?>" alt="Cerámico 3">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo e(asset('storage/images/vasija_iznik2.jpg')); ?>" alt="Cerámico 3">
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
    </div>

    <footer class="mt-5">
        <p>&copy; 2024 Rincón de Cerámica</p>
        <p>
            <a href="<?php echo e(route('welcome')); ?>">Inicio</a> |
            <a href="<?php echo e(route('products.index')); ?>">Productos</a> |
            <a href="<?php echo e(route('contact')); ?>">Contacto</a> |
            <a href="<?php echo e(route('about')); ?>">Acerca de Nosotros</a>
        </p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ceramicos-ecommerce\resources\views/welcome.blade.php ENDPATH**/ ?>