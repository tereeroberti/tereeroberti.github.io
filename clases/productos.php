


<?php
const PRODUCTOS_JSON = 'productos.json';

class Producto
{
    public int $id = 0;
    public string $nombre = "";
    public float $precio = 0;
    public string $categoria = "";
    public string $imagen = "";
    public string $descripcion = "";


    public function cargarDatosDeArray(array $data): void
    {
        $this->id                   = $data['id'];
        $this->nombre               = $data['nombre'];
        $this->precio               = $data['precio'];
        $this->categoria            = $data['categoria'];
        $this->imagen               = $data['imagen'];
        $this->descripcion          = $data['descripcion'];
    }

    /**
     * @return self[]
     */
    public function todos(): array
    {
        $productoJson = json_decode(file_get_contents(__DIR__ . '/../data/' . PRODUCTOS_JSON), true);

        $productos = []; 

        foreach($productoJson as $unProductoJson) {
            $producto = new self;
            $producto->cargarDatosDeArray($unProductoJson);

            $productos[] = $producto;
        }

        return $productos;
    }

    public function porId(int $id): ?self 
    {
        $producto = $this->todos();


        foreach($producto as $unProducto) {
            if($unProducto->id == $id) {
                return $unProducto;
            }
        }

        return null;
    }
}

?>

