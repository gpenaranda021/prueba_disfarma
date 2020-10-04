<?php
// encabezados requeridos
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// incluir archivos para conexión y objeto de clase producto

include_once '../config/database.php';
include_once '../objects/producto.php';
  
// instanciar objeto de DB y producto
$database = new Database();
$db = $database->getConnection();
  
// inicializar objeto
$producto = new Producto($db);

// ejecutar función que lista registros de producto
$stmt = $producto->listar_productos();
$num = $stmt->rowCount();
  
// validar si hay más de un registro
if($num>0){
  
    // array de productos
    $products_arr=array();
    $products_arr["records"]=array();
    // Leer resultados de la consulta y almacenar en array $product_item
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
  
        $product_item=array(
            "id" => $cod_item,
            "name" => $nom_item,
            "description" => html_entity_decode($des_item),
            "quantity"=>$cant_item,
            "price" => $vlr_item,
            "image"=>$img_item

            
        );
  
        array_push($products_arr["records"], $product_item);
    }
  
    // código http - 200 OK
    http_response_code(200);
  
    // se formatea en JSON el array de datos de productos
    echo json_encode($products_arr);
}
  
// En caso de que no haya resultados
else{
  
    // Código http - 404 Not found
    http_response_code(404);
  
    // devolver mensaje
    echo json_encode(
        array("message" => "No hay productos en el inventario.")
    );
}