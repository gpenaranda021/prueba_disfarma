<?php
class Producto{
  
    // Nombre de la tabla y elemento de conexión a BD
    private $conn;
    private $table_name = "inventario";
  
    // Propiedades del objeto
    public $id;
    public $name;
    public $description;
    public $quantity;
    public $price;
    public $image;
    
    
    // constructor con elemento de conexión a BD $db 
    public function __construct($db){
        $this->conn = $db;
    }

    // función para listar los productos
    function listar_productos()
    {
        // 
        $query = "SELECT cod_item, nom_item, des_item, cant_item, vlr_item, img_item
                    FROM ". $this->table_name." 
                    ORDER BY cod_item ASC";
    
        // preparar query para ejecución
        $stmt = $this->conn->prepare($query);
    
        // ejecutar query
        $stmt->execute();
    
        return $stmt;
    }
}
?>