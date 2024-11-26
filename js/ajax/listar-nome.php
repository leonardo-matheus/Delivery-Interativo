<?php 
require_once('../../sistema/conexao.php');
$tel = @$_POST['tel'];

if($tel == ""){
	exit();
}


$taxa_entrega = "0";
$taxa_entregaF = "0";

$query = $pdo->query("SELECT * FROM clientes where telefone = '$tel' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0){
	$nome = $res[0]['nome'];
	$id_cliente = $res[0]['id'];
	$rua = $res[0]['rua'];
    $numero = $res[0]['numero'];
    $bairro = $res[0]['bairro'];
    $complemento = $res[0]['complemento'];


$query = $pdo->query("SELECT * FROM bairros where nome = '$bairro'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

if(@count($res) > 0){
  $taxa_entrega = $res[0]['valor'];
}else{
  $taxa_entrega = 0;
}

$taxa_entregaF = number_format($taxa_entrega, 2, ',', '.');

	
}

echo @$nome.'**'.@$rua.'**'.@$numero.'**'.@$bairro.'**'.@$complemento.'**'.$taxa_entrega.'**'.$taxa_entregaF.'**'.@$id_cliente;

 ?>