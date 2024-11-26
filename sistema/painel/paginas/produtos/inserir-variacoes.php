<?php 
require_once("../../../conexao.php");
$tabela = 'variacoes';

$sigla = $_POST['sigla'];
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$valor = str_replace(',', '.', $valor);
$descricao = $_POST['descricao'];
$produto = $_POST['id'];

//validar sigla
$query = $pdo->query("SELECT * from $tabela where sigla = '$sigla' and produto = '$produto'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'Sigla já Cadastrada, escolha outra!!';
	exit();
}


$query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, produto = '$produto', sigla = :sigla, valor = :valor, descricao = :descricao, ativo = 'Sim'");


$query->bindValue(":nome", "$nome");
$query->bindValue(":valor", "$valor");
$query->bindValue(":descricao", "$descricao");
$query->bindValue(":sigla", "$sigla");
$query->execute();

echo 'Salvo com Sucesso';