
<?php 
require_once __DIR__ . '/../clases/Productos.php';
$productos = (new Producto)->todos();
?>

<section class="container">
        <ul class="breadcrumb list-inline m-5">
		<li><a class="breadcrumb-crumb" href="index.php" title="volver a Home - Nodo si"> Home </a></li>
    	<li><span class="breadcrumb-divider">&gt;</span> <span class="breadcrumb-crumb"><strong> Productos </strong></span></li>
		</ul>

<h1 class="titulo">Catálogo de Productos</h1>

<form class="mb-5" method="GET" action="index.php">
    <input type="hidden" name="seccion" value="productos">
    <label class="px-5" for="categoria">Filtrar por categoría :</label>
    <select name="categoria" id="categoria">
        <option value="">Todas</option>
        <option value="Bolsones" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] == 'Bolsones') ? 'selected' : ''; ?>>Bolsones</option>
        <option value="Fresco" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] == 'Fresco') ? 'selected' : ''; ?>>Fresco</option>
        <option value="Almacen" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] == 'Almacen') ? 'selected' : ''; ?>>Almacen</option>
    </select>
    <button type="submit" class="btn btn-secondary boton mx-5">Filtrar</button>
</form>

<section class="py-5 px-1 bg-white">
  <div class="container">
  <div class="row justify-content-center">
<?php

$categoriaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : '';

if (!empty($productos)) {

    $productosFiltrados = array_filter($productos, function($producto) use ($categoriaSeleccionada) {
      
        if (empty($categoriaSeleccionada)) {
            return true;
        }
        
        return $producto->categoria === $categoriaSeleccionada;
    });
  
    if (!empty($productosFiltrados)) {
        foreach ($productosFiltrados as $producto): ?>
            <div class="col-12 col-sm-6 col-md-3 mb-5 container-productos">
            <div class="card h-100 shadow-sm border-0 p-2 productos justify-content-around">
                <h2><?php echo $producto->nombre; ?></h2>
                <div class="img_producto producto-imagen" style="background-image: url('<?php echo $producto->imagen; ?>')"></div>
                <p><?php echo $producto->nombre; ?></p>
                <p>Precio: $<?php echo $producto->precio; ?></p>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a class="btn btn-outline-secondary mt-3 mb-3" href="index.php?seccion=producto&id=<?php echo $producto->id; ?>">Ver más</a>
                <a class="btn btn-success boton mt-3 mb-3" href="">Agregar al carrito</a>
                </div>
            </div>
            </div>
        <?php endforeach;
    } else {
        echo "No hay productos disponibles para esta categoría";
    }
} else {
    echo "No hay productos disponibles";
}

?>
</div>
</section>


