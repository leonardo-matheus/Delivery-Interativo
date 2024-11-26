<?php 
include('../../conexao.php');

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today')));

$dataInicial = $_GET['dataInicial'];
$dataFinal = $_GET['dataFinal'];
$status = $_GET['status'];
$forma_pgto = $_GET['forma_pgto'];


$dataInicialF = implode('/', array_reverse(explode('-', $dataInicial)));
$dataFinalF = implode('/', array_reverse(explode('-', $dataFinal)));

if($dataInicial == $dataFinal){
	$texto_apuracao = 'APURADO EM '.$dataInicialF;
}else if($dataInicial == '1980-01-01'){
	$texto_apuracao = 'APURADO EM TODO O PERÍODO';
}else{
	$texto_apuracao = 'APURAÇÃO DE '.$dataInicialF. ' ATÉ '.$dataFinalF;
}


if($status == ''){
	$acao_rel = '';
}else{
	if($status == 'Finalizado'){
		$acao_rel = ' Finalizadas ';
	}else{
		$acao_rel = ' Canceladas ';
	}
	
}

if($forma_pgto == ''){
	$texto_tabela = '';
	
}else{
	$texto_tabela = ' '.$forma_pgto;	
}


$status = '%'.$status.'%';
$forma_pgto = '%'.$forma_pgto.'%';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Relatório de Vendas</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">


<style>

		@page {
			margin: 0px;

		}

		body{
			margin-top:5px;
			font-family:Times, "Times New Roman", Georgia, serif;
		}		

			.footer {
				margin-top:20px;
				width:100%;
				background-color: #ebebeb;
				padding:5px;
				position:absolute;
				bottom:0;
			}

		

		.cabecalho {    
			padding:10px;
			margin-bottom:30px;
			width:100%;
			font-family:Times, "Times New Roman", Georgia, serif;
		}

		.titulo_cab{
			color:#0340a3;
			font-size:20px;
		}

		
		
		.titulo{
			margin:0;
			font-size:28px;
			font-family:Arial, Helvetica, sans-serif;
			color:#6e6d6d;

		}

		.subtitulo{
			margin:0;
			font-size:12px;
			font-family:Arial, Helvetica, sans-serif;
			color:#6e6d6d;
		}



		hr{
			margin:8px;
			padding:0px;
		}


		
		.area-cab{
			
			display:block;
			width:100%;
			height:10px;

		}

		
		.coluna{
			margin: 0px;
			float:left;
			height:30px;
		}

		.area-tab{
			
			display:block;
			width:100%;
			height:30px;

		}


		.imagem {
			width: 80px;
			position:absolute;
			right:20px;
			top:10px;
		}

		.titulo_img {
			position: absolute;
			margin-top: 10px;
			margin-left: 10px;

		}

		.data_img {
			position: absolute;
			margin-top: 40px;
			margin-left: 10px;
			border-bottom:1px solid #000;
			font-size: 10px;
		}

		.endereco {
			position: absolute;
			margin-top: 50px;
			margin-left: 10px;
			border-bottom:1px solid #000;
			font-size: 10px;
		}

		.verde{
			color:green;
		}



		table.borda {
    		border-collapse: collapse; /* CSS2 */
    		background: #FFF;
    		font-size:12px;
    		vertical-align:middle;
		}
 
		table.borda td {
		    border: 1px solid #dbdbdb;
		}
		 
		table.borda th {
		    border: 1px solid #dbdbdb;
		    background: #ededed;
		    font-size:13px;
		}
				

	</style>


</head>
<body>	

	
<div class="titulo_cab titulo_img"><u>Relatório de Vendas <?php echo $acao_rel ?>  <?php echo $texto_tabela ?> </u></div>
	<div class="data_img"><?php echo mb_strtoupper($data_hoje) ?></div>

	<img class="imagem" src="<?php echo $url_sistema ?>img/<?php echo $logo_rel ?>">

	
	<br><br><br>
	<div class="cabecalho" style="border-bottom: solid 1px #0340a3">
	</div>

	<div class="mx-2" >

		<section class="area-cab">
			
			<div>
				<small><small><small><u><?php echo $texto_apuracao ?></u></small></small></small>
			</div>

	
			</section>

			<br>

		<?php 
		$total_vendas = 0;
		$total_vendasF = 0;
		$total_canceladas = 0;
		$total_canceladasF = 0;
		$query = $pdo->query("SELECT * from vendas where (data >= '$dataInicial' and data <= '$dataFinal') and pago = 'Sim' and status LIKE '$status' and tipo_pgto LIKE '$forma_pgto' order by data asc, hora asc ");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = count($res);
		if($total_reg > 0){
		 ?>

	<table class="table table-striped borda" cellpadding="6">
  <thead>
    <tr align="center">
      <th>Cliente</th>	
	<th class="esc">Valor</th> 	
	<th class="esc">Total Pago</th> 
	<th class="esc">Troco</th>	
	<th class="esc">Forma PGTO</th> 	
	<th class="esc">Data</th>	 	
	<th class="esc">Hora</th>	
    </tr>
  </thead>
  <tbody>

  	<?php 
  	for($i=0; $i < $total_reg; $i++){
	foreach ($res[$i] as $key => $value){}
	$id = $res[$i]['id'];	
	$cliente = $res[$i]['cliente'];
	$valor = $res[$i]['valor'];
	$total_pago = $res[$i]['total_pago'];
	$troco = $res[$i]['troco'];
	$data = $res[$i]['data'];
	$hora = $res[$i]['hora'];
	$status = $res[$i]['status'];
	$pago = $res[$i]['pago'];
	$obs = $res[$i]['obs'];
	$taxa_entrega = $res[$i]['taxa_entrega'];
	$tipo_pgto = $res[$i]['tipo_pgto'];
	$usuario_baixa = $res[$i]['usuario_baixa'];
	$mesa = $res[$i]['mesa'];
	$nome_do_cliente = $res[$i]['nome_cliente'];
	
	$valorF = number_format($valor, 2, ',', '.');
	$total_pagoF = number_format($total_pago, 2, ',', '.');
	$trocoF = number_format($troco, 2, ',', '.');
	$taxa_entregaF = number_format($taxa_entrega, 2, ',', '.');
	$dataF = implode('/', array_reverse(explode('-', $data)));
	//$horaF = date("H:i", strtotime($hora));	

	

		$query2 = $pdo->query("SELECT * FROM usuarios where id = '$usuario_baixa'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$total_reg2 = @count($res2);
		if($total_reg2 > 0){
			$nome_usuario_pgto = $res2[0]['nome'];
		}else{
			$nome_usuario_pgto = 'Nenhum!';
		}


		$query2 = $pdo->query("SELECT * FROM clientes where id = '$cliente'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$total_reg2 = @count($res2);
		if($total_reg2 > 0){
			$nome_cliente = $res2[0]['nome'];
		}else{
			$nome_cliente = 'Nenhum!';
		}

		if($mesa != '0' and $mesa != ''){
			$nome_cliente = 'Mesa: '.$mesa;
		}

		if($nome_do_cliente != ""){
			$nome_cliente = $nome_do_cliente;
		}


		if($status == 'Finalizado'){
			$classe_alerta = 'text-verde';	
			$total_vendas += $valor;	
			$classe_linha = '';
			$classe_square = 'verde';		
		$imagem = 'verde.jpg';	
		}else if($status == 'Cancelado'){
			$classe_alerta = 'text-danger';
			$total_canceladas += $valor;
			$classe_linha = 'text-muted';	
			$classe_square = 'text-danger';
		
		$imagem = 'vermelho.jpg';
			
		}else{
			$classe_alerta = 'text-primary';
			$total_vendas += $valor;
			$classe_linha = '';		
			$classe_square = 'verde';		
		$imagem = 'verde.jpg';	
		}


		

		$total_vendasF = number_format($total_vendas, 2, ',', '.');	
	$total_canceladasF = number_format($total_canceladas, 2, ',', '.');	

		
  	 ?>

    <tr align="center" class="">
      <td align="left">
      	<img src="<?php echo $url_sistema ?>/img/<?php echo $imagem ?>" width="11px" height="11px" style="margin-top:3px"> <b>Pedido (<?php echo $id ?>)</b> / 
<?php echo $nome_cliente ?>
</td>
<td class="esc">R$ <?php echo $valorF ?></td>
<td class="esc">R$ <?php echo $total_pagoF ?></td>
<td class="esc">R$ <?php echo $trocoF ?></td>
<td class="esc"><?php echo $tipo_pgto ?></td>
<td class="esc"><?php echo $dataF ?></td>
<td class="esc"><?php echo $hora ?></td>
    </tr>

<?php } ?>
  
  </tbody>
</table>

<?php }else{
echo 'Não possuem registros para serem exibidos!';
exit();
} ?>

	</div>



	<div class="col-md-12 p-2">
		<div class="" align="right" style="margin-right: 20px">

			<span class="text-danger"> <small><small><small><small>VENDAS CANCELADAS</small> : R$ <?php echo $total_canceladasF ?></small></small></small>  </span>			
		<span class="text-success"> <small><small><small><small>VENDAS RECEBIDAS</small> : R$ <?php echo $total_vendasF ?></small></small></small>  </span>	

				
		</div>
	</div>
	<div class="cabecalho" style="border-bottom: solid 1px #0340a3">
	</div>



	<div class="footer"  align="center">
		<span style="font-size:10px"><?php echo $nome_sistema ?> </span> 
	</div>

</body>
</html>