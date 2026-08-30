<?php
$id = $_GET['id'];
include '../../infra/conexao.php';

$sql = "DELETE FROM pedido WHERE id = $id";
if ($conexao->query($sql) === TRUE) {
    echo "Pedido excluído com sucesso!<br>";
    echo "<button type='button' onclick=\"window.location.href='../../index.php'\">Voltar</button>";
} else {
    echo "Erro ao excluir Pedido: " . $conexao->error;
}

?>