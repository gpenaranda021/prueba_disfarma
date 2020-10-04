<?php
class Venta
{  
    // elemento de conexión a BD y nombre de la tabla
    private $conn;
    private $table_name = "venta";
  
    // propiedades del objeto
    public $sale_date;
    public $name;
    public $description;
    public $quantity;
    public $product_sale;
    public $client;
    public $payment_mode;
    
    // constructor con elemento de conexión a BD $db 
    public function __construct($db){
        $this->conn = $db;
    }

    //Función que lista los registros de ventas
    function listar_ventas()
    {
        //
        $query = "SELECT v.fecha_venta, p.nom_item, p.des_item, v.und_item, (v.und_item*p.vlr_item) AS venta_por_item, c.nom_apeCliente, v.medio_pago
                FROM ". $this->table_name." v INNER JOIN inventario p ON v.cod_item=p.cod_item 
                                             INNER JOIN cliente c ON v.cod_cliente=c.cod_cliente
                ORDER BY v.fecha_venta ASC";
    
        // preparar query para ejecución
        $stmt = $this->conn->prepare($query);
    
        // ejecutar query
        $stmt->execute();
    
        return $stmt;
    }
}
?>