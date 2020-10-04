<?php
class Producto{
  
    // database connection and table name
    private $conn;
    private $table_name = "inventario";
  
    // object properties
    public $id;
    public $name;
    public $description;
    public $quantity;
    public $price;
    public $image;
    
    //public $category_id;
    //public $category_name;
    //public $created;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function listar_productos()
    {
        // select all query
        $query = "SELECT cod_item, nom_item, des_item, cant_item, vlr_item, img_item
                    FROM ". $this->table_name." 
                    ORDER BY cod_item ASC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
}
?>