<?php

include '../../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $cliente_id = $_POST['cliente_id'];
    $sql = "INSERT INTO pedido (nome, categoria, telefone, endereco, cliente_id) VALUES ('$nome', '$categoria', '$telefone', '$endereco', '$cliente_id')";
    if ($conn->query($sql) === TRUE) {
        echo "Novo pedido cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Novo Pedido</title>
</head>

<body>
    <h2>Adicionar Novo Pedido</h2>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br><br>
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" required>
        <br><br>
        <label for="raca">Telefone:</label>
        <input type="tel" id="telefone" name="telefone">
        <br><br>
        <label for="idade">Endereço:</label>
        <input type="text" id="endereco" name="endereco">
        <br><br>

        <select name="cliente_id" required>
            <option value="">Selecione o Cliente</option>
    
            <?php
                $sql = "SELECT id, nome FROM clientes";
                $clientes = $conn->query($sql);
                while ($cliente = $clientes->fetch_assoc()) {
            ?>

            <option value="<?php echo $cliente['id'];?>"><?php echo $cliente['nome'];?></option>


            <?php
                } 
            ?>
        </select>
        <button type="submit">Cadastrar Pedido</button>
    </form>
    <br>
    <button type="button" onclick="window.location.href='../../index.php'">Voltar</button>
</body>

</html>