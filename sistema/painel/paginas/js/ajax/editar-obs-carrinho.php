<?php 
@session_start();
require_once('../../sistema/conexao.php');

$id = $_POST['id'];
$obs = $_POST['obs'];

$query = $pdo->prepare("UPDATE carrinho set obs = :obs WHERE id = '$id'"); 
$query->bindValue(":obs", "$obs");
$query->execute();

echo 'Salvo com Sucesso';

 ?>