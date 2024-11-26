<?php 
require_once("../../../conexao.php");
$tabela = 'vendas';
@session_start();
$id_usuario = $_SESSION['id'];


$id = $_POST['id'];
$pgto = $_POST['pgto'];

$pdo->query("UPDATE $tabela SET pago = 'Sim', usuario_baixa = '$id_usuario', tipo_pgto = '$pgto' where id = '$id'");

echo 'Baixado com Sucesso';
 ?>