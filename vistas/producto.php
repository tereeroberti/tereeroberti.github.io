<?php
require_once __DIR__ . '/../clases/Productos.php';
$productos = (new Producto)->todos();


$idProducto = $_GET['id'] ?? null;
$productoSeleccionado = null;

foreach ($productos as $producto) {
    if ($producto->id == $idProducto) {
        $productoSeleccionado = $producto;
        break;
    }
}

if (!$productoSeleccionado) {
    echo "Producto no encontrado.";
    exit;
}
?>

<section>
    <div class="posicion">
        <div class="producto-detalle">
            <img class="img_producto_simple" src="<?php echo $productoSeleccionado->imagen; ?>" alt="<?php echo $productoSeleccionado->nombre; ?>">
        </div>
        <div class="producto-detalle2">
            <div class="descripcion">
                <h1><?php echo $productoSeleccionado->nombre; ?></h1>
                <p><?php echo ucfirst($productoSeleccionado->categoria); ?></p>
                <p><?php echo $productoSeleccionado->descripcion; ?></p>
                <p>Precio: $<?php echo number_format($productoSeleccionado->precio, 2); ?></p>
            </div>
            <div class="boton-posicion">
                <a class="btn btn-success boton mt-3 mb-3" href="">Agregar al carrito</a>
                <a class="mx-3" href="index.php?seccion=productos">Volver al listado</a>
            </div>
        </div>
    </div>
</section>