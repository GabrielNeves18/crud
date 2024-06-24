

<?php    
    require_once("URL.php");
    require_once("conn.php");
    
    session_start();
?>

<h1>Entrada de dados (Create)</h1>
<?php
    if(isset($_SESSION['message-error'])){
        echo '<p style="color:red;">' . htmlspecialchars($_SESSION['message-error']) . '</p>';
        unset($_SESSION['message-error']);
    } elseif(isset($_SESSION['message-success'])){
        echo '<p style="color:green;">' . htmlspecialchars($_SESSION['message-success']) . '</p>';
        unset($_SESSION['message-success']);
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

</html>
<form action="<?= htmlspecialchars($BASE_URL . 'crud.php') ?>" method="POST">
    <input type="text" id="nome" name="nome" placeholder="Nome">
    <input type="text" id="sobrenome" name="sobrenome" placeholder="Sobrenome">
    <input type="tel" id="telefone" name="telefone" placeholder="telefone">
    <input type="submit" value="enviar">
</form>

<div class="mostrarOsdados">
<h2>Clientes Registrados (READ)</h2>
    <?php
        try {
            $stmt = $conn->prepare("SELECT * FROM clientes");
            $stmt->execute();
            $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($clientes) {
                echo "<table border='1'>";
                echo "<tr><th>ID</th><th>Nome</th><th>Sobrenome</th><th>Telefone</th></tr>";
                foreach ($clientes as $cliente) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($cliente['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($cliente['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($cliente['sobrenome']) . "</td>";
                    echo "<td>" . htmlspecialchars($cliente['telefone']) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Nenhum cliente encontrado.</p>";
            }
        } catch (PDOException $e) {
            echo "<p>Erro ao buscar dados: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    ?>
</div>

<div class="update">
    <h2>Atualizar Cliente (Update)</h2>
    <form id="updateForm" action="<?= htmlspecialchars($BASE_URL . 'update.php') ?>" method="POST">
        <input type="num" id="update_id" name="id" placeholder="Id" required>
        <input type="tel" id="update_telefone" name="telefone" placeholder="Telefone" required>
        <input type="submit" value="Atualizar">
    </form>
</div>


<div class="delete">
    <h2>Atualizar Cliente (Delete)</h2>
    <form id="deleteForm" action="<?= htmlspecialchars($BASE_URL . 'delete.php') ?>" method="POST">
        <input type="num" id="delete_id" name="id" placeholder="Id" required>
        <input type="submit" value="Deletar">
    </form>
</div>

</body>