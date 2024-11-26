<?php 
require_once("../../../conexao.php");
$tabela = 'vendas';

$id = $_POST['id'];
$acao = $_POST['acao'];
$telefone = @$_POST['telefone'];
$total = @$_POST['total'];
$pagamento = @$_POST['pagamento'];
$texto = @$_POST['texto'];

if($acao == 'Finalizado'){
	$pdo->query("UPDATE $tabela SET status = '$acao', pago = 'Sim' where id = '$id'");
}else{
	$pdo->query("UPDATE $tabela SET status = '$acao' where id = '$id'");
}

echo 'Alterado com Sucesso***';


if($status_whatsapp == 'Api' and $acao == 'Entrega'){
$mensagem = '*Atenção:* '.$texto.'%0A';
$mensagem .= '*Total:* R$ '.$total.'%0A';
$mensagem .= '*Pagamento:* '.$pagamento.'%0A';
$data_mensagem = date('Y-m-d H:i:s');
$tel_cliente_whats = $telefone;
require("../../../../js/ajax/api2.php");
}

?>