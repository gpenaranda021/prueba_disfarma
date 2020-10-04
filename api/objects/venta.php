<?php
class Venta
{  
    // database connection and table name
    private $conn;
    private $table_name = "venta";
  
    // object properties
    public $sale_date;
    public $name;
    public $description;
    public $quantity;
    public $product_sale;
    public $client;
    public $payment_mode;
    
    //public $category_id;
    //public $category_name;
    //public $created;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function listar_ventas()
    {
        // select all query
        $query = "SELECT v.fecha_venta, p.nom_item, p.des_item, v.und_item, (v.und_item*p.vlr_item) AS venta_por_item, c.nom_apeCliente, v.medio_pago
                FROM ". $this->table_name." v INNER JOIN inventario p ON v.cod_item=p.cod_item 
                                             INNER JOIN cliente c ON v.cod_cliente=c.cod_cliente
                ORDER BY v.fecha_venta ASC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
}
?>