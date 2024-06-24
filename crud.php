<?php 
    session_start();
    require_once('conn.php');
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $telefone = $_POST['telefone'];
    
        try {
            $stmt = $conn->prepare("INSERT INTO clientes (nome, sobrenome, telefone) VALUES (:nome, :sobrenome, :telefone)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':sobrenome', $sobrenome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->execute();
            $_SESSION['message-success'] = 'Funcionou o insert';
        } catch (PDOException $e) {
            $_SESSION['message-error'] = 'Não funcionou o insert: ' . $e->getMessage();
        }
    
        header("Location: index.php");
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
?>