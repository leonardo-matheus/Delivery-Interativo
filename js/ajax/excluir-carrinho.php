<?php 
@session_start();
require_once('../../sistema/conexao.php');

$id = $_POST['id'];
$id_sabor = $_POST['id_sabor'];
$sessao = $_SESSION['sessao_usuario'];

$query = $pdo->query("SELECT * FROM carrinho where id = '$id' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$produto = $res[0]['produto'];
$quantidade = $res[0]['quantidade'];


$query = $pdo->query("SELECT * FROM produtos where id = '$produto' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$estoque = @$res[0]['estoque'];
$tem_estoque = @$res[0]['tem_estoque'];

$pdo->query("DELETE FROM carrinho WHERE id = '$id'"); 



//abater produto estoque
if($tem_estoque == 'Sim'){
$total_produtos = $estoque + $quantidade;
$pdo->query("UPDATE produtos SET estoque = '$total_produtos' where id = '$produto'"); 
}


if($id_sabor > 0){
$pdo->query("DELETE FROM carrinho where sessao = '$sessao' and (item = '$id_sabor' or id_sabor = '$id_sabor')");
}

echo 'Excluido com Sucesso';

 ?>