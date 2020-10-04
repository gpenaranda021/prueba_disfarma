<?php
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

include('api/shared/utilities.php');
include('api/objects/producto.php');
?>

<!DOCTYPE html>
<html>
<title>Prueba</title>
<body>

<?php
$url="http://localhost/prueba_disfarma/api/producto/leer_prod.php";
$data_sol=array();

$resp=Utils::curl_request($url, $data_sol, "GET");

if(isset($resp["response"]))
{
    $data=$resp["response"];
    //print_r($data);
    echo '<table border=2>';
    echo '<thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
            </tr>
          </thead>
          <tbody>';
    foreach($data AS $d)
    {
        echo 
        '<tr>
            <td>'.$d["id"].'</td>
            <td>'.$d["name"].'</td>
        </tr>';
        //echo $d["id"];
        //echo $d["name"];
    }
    echo '</tbody></table>';
}
?>

</body>
</html> 
