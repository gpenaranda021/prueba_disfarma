<?php
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

include('../api/shared/utilities.php');
include('../api/objects/producto.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Listar productos | Prueba Disfarma</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

    <!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">DISFARMA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <!--
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
      -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="listar_productos.php">Listar productos</a>
          <a class="dropdown-item" href="listar_ventas.php">Listar ventas</a>          
        </div>
      </li>
    </ul>

  </div>
</nav>

<main role="main" class="container">

  <div class="starter-template">
    <h1>Listar productos</h1>
    <p class="lead">A continuación, se listan los productos registrados en la base de datos.</p>
  </div>

</main><!-- /.container -->

<div class="container">

<?php
// Especificar el contenido para listar los datos consultando a la API

$url="http://localhost/prueba_disfarma/api/producto/leer_prod.php";
$data_sol=array();

$resp=Utils::curl_request($url, $data_sol, "GET");

if(isset($resp["response"]))
{
    $data=$resp["response"];
    //print_r($data);
    echo '<table class="table table-striped">';
    echo '<thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Cantidad en inv.</th>
                <th>Precio x und.</th>
            </tr>
          </thead>
          <tbody>';
    foreach($data AS $d)
    {
        echo 
        '<tr>
            <td>'.$d["id"].'</td>
            <td>'.$d["name"].'</td>
            <td>'.$d["description"].'</td>
            <td>'.$d["quantity"].'</td>
            <td>'.$d["price"].'</td>
        </tr>';
        //echo $d["id"];
        //echo $d["name"];
    }
    echo '</tbody></table>';
}
?>

</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="../js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
</body>
</html>

<?php?>
