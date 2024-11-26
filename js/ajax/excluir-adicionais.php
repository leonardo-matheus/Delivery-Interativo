<?php 
@session_start();
require_once('../../sistema/conexao.php');

$id = $_POST['id'];
$valor = $_POST['valor'];
$id_carrinho = $_POST['carrinho'];
$id_sabor = $_POST['id_sabor'];
$item = $_POST['item'];

$sessao = $_SESSION['sessao_usuario'];

$pdo->query("DELETE FROM temp WHERE id = '$id'"); 

$query2 =$pdo->query("SELECT * FROM carrinho where id = '$id_carrinho'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
$total_item = $res2[0]['total_item'];

$total = $total_item - $valor;
$pdo->query("UPDATE carrinho SET total_item = '$total' where id = '$id_carrinho'");


if($id_sabor > 0){
	$query2 =$pdo->query("SELECT * FROM carrinho where sessao = '$sessao' and item = '$id_sabor'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
$total_item = $res2[0]['total_item'];

$total = $total_item - $valor;
$pdo->query("UPDATE carrinho SET total_item = '$total' where sessao = '$sessao' and item = '$id_sabor'");

}


echo 'Excluido com Sucesso';



 ?>