<?php
    require_once("conn.php");

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $id = $_POST['id'];
        $telefone = $_POST['telefone'];

        try{
            $stmt = $conn->prepare("UPDATE clientes SET telefone = :telefone WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->execute();
            $_SESSION['message-success'] = 'Funcionou o update: ';
        } catch(PDOException $e){
            $_SESSION['message-error'] = 'Não funcionou o update: ' . $e->getMessage();
        }
    
        header("Location: index.php");
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
?>