<?php

include '../../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $sql = "INSERT INTO restaurante (nome, categoria, telefone, endereco) VALUES ('?', '?', '?', '?')";
    if ($conn->query($sql) === TRUE) {
        echo "Novo restaurante cadastrado com sucesso!";
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
    <title>Adicionar Novo Restaurante</title>
</head>
<body>
    <h2>Adicionar Novo Restaurante</h2>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $restaurante['nome']; ?>" required>
        <br><br>
        <label for="categoria"> Categoria:</label>
        <input type="text" id="categoria" name="categoria" value="<?php echo $restaurante['categoria']; ?>" required>
        <br><br>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?php echo $restaurante['telefone']; ?>">
        <br><br>
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" value="<?php echo $restaurante['endereco']; ?>">
        <br><br>
        <button type="submit">Cadastrar Restaurante</button>
    </form> 
    <br>  
    <button type="button" onclick="window.location.href='../../index.php'">Voltar</button>
</body>
</html>
