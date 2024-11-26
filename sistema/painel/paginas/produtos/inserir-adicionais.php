<?php 
require_once("../../../conexao.php");
$tabela = 'adicionais';

$nome = $_POST['nome'];
$produto = $_POST['id'];
$valor = $_POST['valor'];
$valor = str_replace(',', '.', $valor);

//validar sigla
$query = $pdo->query("SELECT * from $tabela where nome = '$nome' and produto = '$produto'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'Adicional já Cadastrado, escolha outro!!';
	exit();
}


$query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, valor = :valor, produto = '$produto', ativo = 'Sim'");


$query->bindValue(":nome", "$nome");
$query->bindValue(":valor", "$valor");
$query->execute();

echo 'Salvo com Sucesso';