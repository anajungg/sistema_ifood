<?php

include "../../infra/conexao.php";

$sql_clientes = "SELECT id, nome FROM clientes";
$clientes = mysqli_query($conexao, $sql_clientes);

$sql_restaurantes = "SELECT id, nome FROM restaurante";
$restaurantes = mysqli_query($conexao, $sql_restaurantes);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cliente_id = $_POST["cliente_id"];
    $restaurante_id = $_POST["restaurante_id"];
    $data_pedido = $_POST["data_pedido"];
    $valor = $_POST["valor"];
    $status = $_POST["status"];

    $sql = "INSERT INTO pedido 
            (cliente_id, restaurante_id, data_pedido, valor, status)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param( $stmt,"iisds", $cliente_id, $restaurante_id, $data_pedido, $valor, $status);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: listar_pedido.php");
        exit;
    } else {
        echo "Erro ao cadastrar pedido: " . mysqli_error($conexao);
    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Pedido</title>
</head>

<body>

    <h1>Adicionar Pedido</h1>

    <form method="POST">

        <label>Cliente:</label>
        <select name="cliente_id" required>
            <option value="">Selecione um cliente</option>

            <?php while ($cliente = mysqli_fetch_assoc($clientes)) { ?>
                <option value="<?= $cliente['id'] ?>">
                    <?= $cliente['nome'] ?>
                </option>
            <?php } ?>

        </select>

        <br><br>

        <label>Restaurante:</label>
        <select name="restaurante_id" required>
            <option value="">Selecione um restaurante</option>

            <?php while ($restaurante = mysqli_fetch_assoc($restaurantes)) { ?>
                <option value="<?= $restaurante['id'] ?>">
                    <?= $restaurante['nome'] ?>
                </option>
            <?php } ?>

        </select>

        <br><br>

        <label>Data do pedido:</label>
        <input type="date" name="data_pedido" required>

        <br><br>

        <label>Valor:</label>
        <input type="number" name="valor" required>

        <br><br>

        <label>Status:</label>
        <select name="status" required>
            <option value="">Selecione o status</option>
            <option value="Pendente">Pendente</option>
            <option value="Preparando">Preparando</option>
            <option value="Saiu para entrega">Saiu para entrega</option>
            <option value="Entregue">Entregue</option>
            <option value="Cancelado">Cancelado</option>
        </select>

        <br><br>

        <button type="submit">Cadastrar Pedido</button>

    </form>

</body>

</html>
```
