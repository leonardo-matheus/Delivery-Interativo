<?php 
@session_start();
require_once('../../sistema/conexao.php');

$id = $_POST['id'];


$pdo->query("DELETE FROM carrinho WHERE id = '$id'"); 

echo 'Excluido com Sucesso';

 ?>