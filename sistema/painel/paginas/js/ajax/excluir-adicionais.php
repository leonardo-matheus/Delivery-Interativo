<?php 
@session_start();
require_once('../../sistema/conexao.php');

$id = $_POST['id'];
$valor = $_POST['valor'];
$id_carrinho = $_POST['carrinho'];

$pdo->query("DELETE FROM temp WHERE id = '$id'"); 

$query2 =$pdo->query("SELECT * FROM carrinho where id = '$id_carrinho'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
$total_item = $res2[0]['total_item'];

$total = $total_item - $valor;
$pdo->query("UPDATE carrinho SET total_item = '$total' where id = '$id_carrinho'");

echo 'Excluido com Sucesso';



 ?>