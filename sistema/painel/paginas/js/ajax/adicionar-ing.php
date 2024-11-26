<?php 
@session_start();
require_once('../../sistema/conexao.php');

$id = $_POST['id'];
$acao = $_POST['acao'];
$sessao = @$_SESSION['sessao_usuario'];

if($acao == 'Não'){
  $pdo->query("INSERT INTO temp SET sessao = '$sessao', tabela = 'ingredientes', id_item = '$id', carrinho = '0', data = curDate()"); 
}else{
    $pdo->query("DELETE FROM temp WHERE id_item = '$id' and sessao = '$sessao' and tabela = 'ingredientes' and carrinho = '0'"); 
}

echo 'Alterado com Sucesso';

 ?>