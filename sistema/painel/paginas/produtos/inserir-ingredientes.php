<?php 
require_once("../../../conexao.php");
$tabela = 'ingredientes';

$nome = $_POST['nome'];
$produto = $_POST['id'];

//validar sigla
$query = $pdo->query("SELECT * from $tabela where nome = '$nome' and produto = '$produto'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'Ingrediente já Cadastrado, escolha outra!!';
	exit();
}


$query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, produto = '$produto', ativo = 'Sim'");


$query->bindValue(":nome", "$nome");
$query->execute();

echo 'Salvo com Sucesso';