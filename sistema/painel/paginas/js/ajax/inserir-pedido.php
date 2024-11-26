<?php 
@session_start();
require_once('../../sistema/conexao.php');

$pagamento = $_POST['pagamento'];
$entrega = $_POST['entrega'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$complemento = $_POST['complemento'];
$total_pago = $_POST['troco'];
$obs = $_POST['obs'];
$sessao = @$_SESSION['sessao_usuario'];
$total_pago = str_replace(',', '.', $total_pago);

if($entrega == "Delivery"){
  $query = $pdo->query("SELECT * FROM bairros where nome = '$bairro'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$taxa_entrega = $res[0]['valor'];
}else{
  $taxa_entrega = 0;
}



$total_carrinho = 0;
$query = $pdo->query("SELECT * FROM carrinho where sessao = '$sessao' and id_sabor = 0");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$cliente = $res[0]['cliente'];

  for($i=0; $i < $total_reg; $i++){
    foreach ($res[$i] as $key => $value){}  

      $id = $res[$i]['id'];
    $total_item = $res[$i]['total_item'];
    $produto = $res[$i]['produto']; 

    $total_carrinho += $total_item;    
    
  }

 


 $total_com_frete = $total_carrinho + $taxa_entrega;
  if($total_pago == ""){
    $total_pago = $total_com_frete;
  }
 $troco = $total_pago - $total_com_frete;
 
//atualiza os dados do cliente
$query = $pdo->prepare("UPDATE clientes SET rua = :rua, numero = :numero, complemento = :complemento, bairro = :bairro where id = '$cliente'");
$query->bindValue(":rua", "$rua");
$query->bindValue(":numero", "$numero");
$query->bindValue(":complemento", "$complemento");
$query->bindValue(":bairro", "$bairro");
$query->execute();    


$query = $pdo->prepare("INSERT INTO vendas SET cliente = '$cliente', valor = '$total_com_frete', total_pago = '$total_pago', troco = '$troco', data = curDate(), hora = curTime(), status = 'Iniciado', pago = 'Não', obs = :obs, taxa_entrega = '$taxa_entrega', tipo_pgto = '$pagamento', usuario_baixa = '0', entrega = '$entrega'"); 
$query->bindValue(":obs", "$obs");
$query->execute();
$id_pedido = $pdo->lastInsertId();



//relacionar itens do carrinho com o pedido
$pdo->query("UPDATE carrinho SET pedido = '$id_pedido' where sessao = '$sessao' and pedido = '0'"); 

//limpar a sessao aberta
@$_SESSION['sessao_usuario'] = "";
session_destroy();

$hora_pedido = date('H:i', strtotime("+$previsao_entrega minutes",strtotime(date('H:i'))));
echo $hora_pedido;
 ?>