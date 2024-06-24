<?php 

    $dbname = "crud";
    $user = "root";
    $pass = "";
    $host = "localhost";

    

    // ERROS PDO
    try{
        $conn = new PDO("mysql:dbname=$dbname;host=$host", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch(PDOException $e){
        echo "Conexão falhou: " . $e->getMessage();
    }

?>