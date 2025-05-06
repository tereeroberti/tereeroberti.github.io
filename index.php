<?php

$rutas = [
    'home'              => [
        'titulo' => 'Página principal',
    ],
    'productos'          => [
        'titulo' => 'Productos disponibles',
    ],
    'producto'     => [
        'titulo' => 'Detalle de producto',
    ],
    'contacto'               => [
        'titulo' => 'Contacto',
    ],
    '404'               => [
        'titulo' => 'Página no encontrada',
    ],
];


$seccion = $_GET['seccion'] ?? 'home';


if(!isset($rutas[$seccion])) {
    
    $seccion = '404';
}

$rutaConfig = $rutas[$seccion];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $rutaConfig['titulo'];?> - Nodo Si</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
<nav class="navbar navbar-expand-md navbar-profesional sticky-top " data-bs-theme="dark">
  <div class="container">
  <a class="navbar-brand d-md-none bi logo-nav" href="#">logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel" data-bs-theme="light">
      <div class="offcanvas-header">
        <h3 class="offcanvas-title" id="offcanvasLabel">Menú</h3>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" ></button>
      </div>
      <div class="offcanvas-body" >
        <ul class="navbar-nav flex-grow-1 justify-content-evenly">
          <li class="nav-item"><a class="nav-link"  href="index.php?seccion=home">Inicio</a></li>
          <li class="nav-item"><a class="nav-link"  href="index.php?seccion=productos">Productos</a></li>
          <li class="nav-item"><a class="nav-link"  href="index.php?seccion=contacto">Contacto</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

</header>

<main>

<?php   require_once __DIR__ . '/vistas/' . $seccion . '.php'; ?>
 
</main>
<footer class="fondo-opaco text-white">
  <div class="py-3  ">
    <ul class="nav justify-content-center pb-3 mb-3">
      <li class="nav-item"><a href="index.php?seccion=home" class="nav-link px-2 link-offset-2 link-underline link-underline-opacity-0 text-white">Home</a></li>
      <li class="nav-item"><a href="index.php?seccion=productos" class="nav-link px-2 link-offset-2 link-underline link-underline-opacity-0 text-white ">Productos</a></li>
      <li class="nav-item"><a href="index.php?seccion=contacto" class="nav-link px-2 link-offset-2 link-underline link-underline-opacity-0 text-white">Contacto</a></li>
    </ul>
    <p class="text-center ">© Programación II - 2025</p>
</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>