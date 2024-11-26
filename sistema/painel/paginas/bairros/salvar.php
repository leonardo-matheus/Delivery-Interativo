<?php 
require_once("../../../conexao.php");
$tabela = 'bairros';

$id = $_POST['id'];
$nome = $_POST['nome'];
$valor = $_POST['valor'];


//validar email
$query = $pdo->query("SELECT * from $tabela where nome = '$nome'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'Localidade já Cadastrada, escolha outra!!';
	exit();
}


if($id == ""){
	$query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, valor = :valor");
}else{
	$query = $pdo->prepare("UPDATE $tabela SET nome = :nome, valor = :valor WHERE id = '$id'");
}

$query->bindValue(":nome", "$nome");
$query->bindValue(":valor", "$valor");
$query->execute();

echo 'Salvo com Sucesso';

?>