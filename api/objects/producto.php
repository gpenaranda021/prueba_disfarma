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
        $query = "SELECT cod_item, nom_item, des_item, cant_item, vlr_item
                    FROM ". $this->table_name." 
                    ORDER BY cod_item ASC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
/*
    function listar_ventas()
    {
        // select all query
        $query = "SELECT v.fecha_venta, p.nom_item, p.des_item, v.und_item, (v.und_item*p.vlr_item) AS venta_por_item, c.nom_apeCliente, v.medio_pago
                FROM ". $this->table_name."p INNER JOIN venta v ON p.cod_item=v.cod_item 
                                             INNER JOIN cliente c ON v.cod_cliente=c.cod_cliente
                ORDER BY v.fecha_venta ASC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
*/



}
?>