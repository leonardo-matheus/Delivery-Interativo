<?php 
require_once("../../../conexao.php");
$tabela = 'vendas';

$id = $_POST['id'];

$pdo->query("UPDATE $tabela SET status = 'Cancelado' where id = '$id'");
echo 'Excluído com Sucesso';
 ?>