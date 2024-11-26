<?php 
@session_start();
require_once('../../sistema/conexao.php');

$bairro = $_POST['bairro'];
$total_compra = $_POST['total_compra'];
$entrega = $_POST['entrega'];



$query = $pdo->query("SELECT * FROM bairros where nome = '$bairro'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0){
$taxa_entrega = $res[0]['valor'];
}else{
	$taxa_entrega = 0;
}

if($entrega != 'Delivery'){
	$taxa_entrega = 0;	
}
$taxa_entregaF = number_format($taxa_entrega, 2, ',', '.');	

$final_compra = $total_compra + $taxa_entrega;
$final_compraF = number_format($final_compra, 2, ',', '.');	

echo $taxa_entregaF . '-'. $final_compraF;
 ?>

