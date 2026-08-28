<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de restaurante Ifood</title>
</head>

<body>
    <h2>Restaurante Ifood</h2>

    <button type="button" onclick="window.location.href='public/clientes/add_cliente.php'">Cadastrar Cliente</button>
    <button type="button" onclick="window.location.href='public/restaurante/add_restaurante.php'">Cadastrar Restaurante</button>
    <button type="button" onclick="window.location.href='public/pedidos/add_pedido.php'">Cadastrar Pedido</button>

    <br>
    <h2>Lista de Clientes</h2>

    <table>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Endereço</th>
        <th>Ações</th>

        <?php
        include 'infra/conexao.php';
        $sql = "SELECT * FROM clientes";
        $clientes = $conn->query($sql);
        while ($cliente = $clientes->fetch_assoc()) {
        ?>

            <tr>
                <td><?php echo $cliente['id']; ?></td>
                <td><?php echo $cliente['nome']; ?></td>
                <td><?php echo $cliente['email']; ?></td>
                <td><?php echo $cliente['telefone']; ?></td>
                <td><?php echo $cliente['endereco']; ?></td>
                    <button type="button" onclick="window.location.href='public/clientes/editar_cliente.php?id=<?php echo $cliente['id']; ?>'">Editar</button>
                    <button type="button" onclick="if (confirm('Tem certeza que deseja excluir este cliente?')) { window.location.href='public/clientes/delete_cliente.php?id=<?php echo $cliente['id']; ?>'; }">Excluir</button>
                </td>
            </tr>

        <?php
        }
        ?>
    </table>

    <h2>Lista de Restaurante</h2>
    <table>
        <th>ID</th>
        <th>Nome</th>
        <th>Categoria</th>
        <th>Telefone</th>
        <th>Endereço</th>
        <th>Ações</th>
        <?php
        $sql = "SELECT * FROM restaurante";
        $restaurante = $conn->query($sql);
        while ($rest = $restaurante->fetch_assoc()) {
        ?>

            <tr>
                <td><?php echo $rest['id']; ?></td>
                <td><?php echo $rest['nome']; ?></td>
                <td><?php echo $rest['categoria']; ?></td>
                <td><?php echo $rest['telefone']; ?></td>
                <td><?php echo $rest['endereco']; ?></td>
                <td>
                    <button type="button" onclick="window.location.href='public/restaurante/editar_restaurante.php?id=<?php echo $rest['id']; ?>'">Editar</button>
                    <button type="button" onclick="if (confirm('Tem certeza que deseja excluir este restaurante?')) { window.location.href='public/restaurante/delete_restaurante.php?id=<?php echo $rest['id']; ?>'; }">Excluir</button>
                </td>
            </tr>


            <h2>Lista de Pedidos</h2>
    <table>
        <th>ID</th>
        <th>Cliente_id</th>
        <th>Restauranyte_id</th>
        <th>Data_pedido</th>
        <th>Status</th>
        <th>Ações</th>


       
        $sql = "SELECT * FROM pedidos";
        $pedidos = $conn->query($sql);
        while ($pedido = $pedidos->fetch_assoc()) {
        ?>

            <tr>
                <td><?php echo $pedido['id']; ?></td>
                <td><?php echo $pedido['cliente_id']; ?></td>
                <td><?php echo $pedido['restaurante_id']; ?></td>
                <td><?php echo $pedido['data_pedido']; ?></td>
                <td><?php echo $pedido['status']; ?></td>
                <td>
                    <button type="button" onclick="window.location.href='public/pedidos/editar_pedido.php?id=<?php echo $pedido['id']; ?>'">Editar</button>
                    <button type="button" onclick="if (confirm('Tem certeza que deseja excluir este pedido?')) { window.location.href='public/pedidos/delete_pedido.php?id=<?php echo $pedido['id']; ?>'; }">Excluir</button>
                </td>
            </tr>

        <?php
        }
        ?>

</body>

</html>