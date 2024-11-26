<?php 
require_once("../../../conexao.php");
$tabela = 'clientes';

$id = $_POST['id'];
$nome = $_POST['nome'];
$bairro = $_POST['bairro'];
$telefone = $_POST['telefone'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];

//validar email
$query = $pdo->query("SELECT * from $tabela where telefone = '$telefone'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'Telefone já Cadastrado, escolha outro!!';
	exit();
}

if($id == ""){
	$query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, telefone = :telefone, rua = :rua, bairro = '$bairro',  numero = :numero, data = curDate(), complemento = :complemento");
}else{
	$query = $pdo->prepare("UPDATE $tabela SET nome = :nome, telefone = :telefone, rua = :rua, bairro = '$bairro',  numero = :numero, data = curDate(), complemento = :complemento WHERE id = '$id'");
}

$query->bindValue(":nome", "$nome");
$query->bindValue(":complemento", "$complemento");
$query->bindValue(":rua", "$rua");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":numero", "$numero");
$query->execute();

echo 'Salvo com Sucesso';

?>