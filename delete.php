<?php
    require_once("conn.php");

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $id = $_POST['id'];
        
        try{
            $stmt = $conn->prepare("DELETE FROM clientes WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $_SESSION['message-error'] = 'Funcionou o delete: ';
        } catch(PDOException $e){
            $_SESSION['message-error'] = 'Não funcionou o delete: ' . $e->getMessage();
        }
    
        header("Location: index.php");
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
?>