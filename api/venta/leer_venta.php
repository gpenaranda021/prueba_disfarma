<?php
// Encabezados requeridos
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// incluir archivos para base de datos y clase de objeto

include_once '../config/database.php';
include_once '../objects/venta.php';
  
// instanciar objetos de base de datos y venta
$database = new Database();
$db = $database->getConnection();
  
// inicializar objeto
$venta = new Venta($db);

// listar registros de ventas
$stmt = $venta->listar_ventas();
$num = $stmt->rowCount();
  
// validar si hay más de un registro
if($num>0){
  
    // array de registros de ventas
    $sales_arr=array();
    $sales_arr["records"]=array();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
  
        $sale_item=array(
            "sale_date"=> $fecha_venta,
            "name" => $nom_item,
            "description" => html_entity_decode($des_item),
            "quantity"=>$und_item,
            "product_sale"=>$venta_por_item,
            "client" => $nom_apeCliente,
            "payment_mode"=>$medio_pago            
        );
  
        array_push($sales_arr["records"], $sale_item);
    }
  
    // código HTTP - 200 OK
    http_response_code(200);
  
    // se formatea en JSON array de datos de ventas
    echo json_encode($sales_arr);
}
  
// en caso de que no haya resultados a la consulta
else{
  
    // código HTTP - 404 Not found
    http_response_code(404);
  
    // Mostrar mensaje al usuario
    echo json_encode(
        array("message" => "No hay ventas registradas.")
    );
}