<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// database connection will be here

include_once '../config/database.php';
include_once '../objects/venta.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$venta = new Venta($db);
  
// read products will be here

// query products
$stmt = $venta->listar_ventas();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $sales_arr=array();
    $sales_arr["records"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
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
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show products data in json format
    echo json_encode($sales_arr);
}
  
// no products found will be here
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "No hay ventas registradas.")
    );
}