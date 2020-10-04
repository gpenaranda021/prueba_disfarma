<?php
class Database{
  
    // Especificar datos de la BD para pruebas
    private $host = "localhost";
    private $db_name = "prueba_disfarma";
    private $username = "root";
    private $password = "";
    public $conn;
  
    // Función para gestionar conexiones
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>