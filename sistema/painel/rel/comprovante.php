<?php 
include('../../conexao.php');

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today')));

$id = $_GET['id'];

//BUSCAR AS INFORMAÇÕES DO PEDIDO
$query = $pdo->query("SELECT * from vendas where id = '$id' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

$id = $res[0]['id'];	
$cliente = $res[0]['cliente'];
$valor = $res[0]['valor'];
$total_pago = $res[0]['total_pago'];
$troco = $res[0]['troco'];
$data = $res[0]['data'];
$hora = $res[0]['hora'];
$status = $res[0]['status'];
$pago = $res[0]['pago'];
$obs = $res[0]['obs'];
$taxa_entrega = $res[0]['taxa_entrega'];
$tipo_pgto = $res[0]['tipo_pgto'];
$usuario_baixa = $res[0]['usuario_baixa'];
$entrega = $res[0]['entrega'];
$mesa = $res[0]['mesa'];
$nome_cliente_ped = $res[0]['nome_cliente'];

$valorF = number_format($valor, 2, ',', '.');
$total_pagoF = number_format($total_pago, 2, ',', '.');
$trocoF = number_format($troco, 2, ',', '.');
$taxa_entregaF = number_format($taxa_entrega, 2, ',', '.');
$dataF = implode('/', array_reverse(explode('-', $data)));
	//$horaF = date("H:i", strtotime($hora));	

$valor_dos_itens = $valor - $taxa_entrega;
$valor_dos_itensF = number_format($valor_dos_itens, 2, ',', '.');

$hora_pedido = date('H:i', strtotime("+$previsao_entrega minutes",strtotime($hora)));

$query2 = $pdo->query("SELECT * FROM clientes where id = '$cliente'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
$total_reg2 = @count($res2);
if($total_reg2 > 0){
$nome_cliente = @$res2[0]['nome'].' Tel: '.@$res2[0]['telefone'];
$telefone_cliente = @$res2[0]['telefone'];
$rua_cliente = @$res2[0]['rua'];
$numero_cliente = @$res2[0]['numero'];
$complemento_cliente = @$res2[0]['complemento'];
$bairro_cliente = @$res2[0]['bairro'];
}else{

if($mesa != '0' and $mesa != ''){
	$nome_cliente = 'Mesa: '.$mesa;
}else{
	$nome_cliente = $nome_cliente_ped;
}

if($nome_cliente_ped != ""){
			$nome_cliente = $nome_cliente_ped;
		}

$telefone_cliente = '';
$rua_cliente = '';
$numero_cliente = '';
$complemento_cliente = '';
$bairro_cliente ='';
}

if($entrega == 'Retirar'){
	$entrega = 'Retirar no Local';
}

if($entrega == 'Consumir Local'){
	$entrega = 'Consumir no Local';
}


?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php if(@$_GET['imp'] != 'Não'){ ?>
<script type="text/javascript">
	$(document).ready(function() {    		
		window.print();
		window.close(); 
	} );
</script>
<?php } ?>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<style type="text/css">
	*{
		margin:0px;

		/*Espaçamento da margem da esquerda e da Direita*/
		padding:0px;
		background-color:#ffffff;


	}
	.text {
		&-center { text-align: center; }
	}
	
	.printer-ticket {
		display: table !important;
		width: 100%;

		/*largura do Campos que vai os textos*/
		max-width: 400px;
		font-weight: light;
		line-height: 1.3em;

		/*Espaçamento da margem da esquerda e da Direita*/
		padding: 0px;
		font-family: TimesNewRoman, Geneva, sans-serif; 

		/*tamanho da Fonte do Texto*/
		font-size: <?php echo $fonte_comprovante ?>px; 



	}
	
	.th { 
		font-weight: inherit;
		/*Espaçamento entre as uma linha para outra*/
		padding:5px;
		text-align: center;
		/*largura dos tracinhos entre as linhas*/
		border-bottom: 1px dashed #000000;
	}

	.itens { 
		font-weight: inherit;
		/*Espaçamento entre as uma linha para outra*/
		padding:5px;
		
	}

	.valores { 
		font-weight: inherit;
		/*Espaçamento entre as uma linha para outra*/
		padding:2px 5px;
		
	}


	.cor{
		color:#000000;
	}
	
	
	.title { 
		font-size: 12px;
		text-transform: uppercase;
		font-weight: bold;
	}

	/*margem Superior entre as Linhas*/
	.margem-superior{
		padding-top:5px;
	}
	
	
}
</style>



<div class="printer-ticket">		
	<div  class="th title"><?php echo $nome_sistema ?></div>

	<div  class="th">
		<?php echo $endereco_sistema ?> <br />
		<small>Contato: <?php echo $telefone_sistema ?> 
		<?php if($cnpj_sistema != ""){echo ' / CNPJ '. @$cnpj_sistema; } ?>
	</small>  
</div>



<div  class="th">Cliente <?php echo $nome_cliente ?>			
<br>
Venda: <b><?php echo $id ?></b> - Data: <?php echo $dataF ?> Hora: <?php echo $hora ?>
</div>

<div  class="th title" >Comprovante de Venda</div>

<div  class="th">CUMPOM NÃO FISCAL</div>

<?php 

$nome_produto2 = '';
$res = $pdo->query("SELECT * from carrinho where pedido = '$id' and id_sabor = 0 order by id asc");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados);

$sub_tot;
for ($i=0; $i < count($dados); $i++) { 
	foreach ($dados[$i] as $key => $value) {
	}
	$id_carrinho = $dados[$i]['id']; 
	$id_produto = $dados[$i]['produto']; 
	$quantidade = $dados[$i]['quantidade'];
	$total_item = $dados[$i]['total_item'];
	$obs_item = $dados[$i]['obs'];
	$item = $dados[$i]['item'];
		$variacao = $dados[$i]['variacao'];


		$query2 = $pdo->query("SELECT * FROM variacoes where id = '$variacao'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		if(@count(@$res2) > 0){
			$sigla_variacao = '('.$res2[0]['sigla'].')';			
		}else{
			$sigla_variacao = '';
		}

		$query2 = $pdo->query("SELECT * FROM produtos where id = '$id_produto'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		if(@count(@$res2) > 0){
			$nome_produto = $res2[0]['nome'];
			$foto_produto = $res2[0]['foto'];
		}else{
			$nome_produto2 = '';
			$query33 = $pdo->query("SELECT * FROM carrinho where id_sabor = '$item' and pedido = '$id' ");
$res33 = $query33->fetchAll(PDO::FETCH_ASSOC);
$total_reg33 = @count($res33);
if($total_reg33 > 0){
	
	for($i33=0; $i33 < $total_reg33; $i33++){
		foreach ($res33[$i33] as $key => $value){}
		$prod = $res33[$i33]['produto'];
		$id_car = $res33[$i33]['id'];

		$query2 = $pdo->query("SELECT * FROM produtos where id = '$prod'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		if(@count(@$res2) > 0){
			
			$foto_produto = $res2[0]['foto'];
			$cat_produto = $res2[0]['categoria'];
			if($i33 < $total_reg33 - 1){
				$nome_prod = $res2[0]['nome']. ' / ';
			}else{
				$nome_prod = $res2[0]['nome'];
			}
			
		}		

		$nome_produto2 .= $nome_prod;
	}
	
	$nome_produto = $nome_produto2;


}
		} 


	?>

	<div class="row itens">

		<div align="left" class="col-9"> <?php echo $quantidade ?> - <?php echo $nome_produto ?> <?php echo $sigla_variacao ?>

	</div>		

	<div align="right" class="col-3">
		R$ <?php		
		$total_itemF = number_format($total_item , 2, ',', '.');
				// $total = number_format( $cp1 , 2, ',', '.');
		echo $total_itemF ;
		?>
	</div>



		<?php 

		$query33 = $pdo->query("SELECT * FROM carrinho where id_sabor = '$item' and pedido = '$id' and id_sabor > 0");
$res33 = $query33->fetchAll(PDO::FETCH_ASSOC);
$total_reg33 = @count($res33);
if($total_reg33 > 0){
	
	for($i33=0; $i33 < $total_reg33; $i33++){
		foreach ($res33[$i33] as $key => $value){}
		$prod = $res33[$i33]['produto'];
		$id_car = $res33[$i33]['id'];

		$query2 = $pdo->query("SELECT * FROM produtos where id = '$prod'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		if(@count(@$res2) > 0){
			
			$nome_prod = $res2[0]['nome'];
		}

	$query2 =$pdo->query("SELECT * FROM temp where carrinho = '$id_car' and tabela = 'adicionais'");
	$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
	$total_reg2 = @count($res2);
	if($total_reg2 > 0){
		if($total_reg2 > 1){
			$texto_adicional = $nome_prod .' ('.$total_reg2.') Adicionais';
		}else{
			$texto_adicional = $nome_prod .' ('.$total_reg2.') Adicional';
		}
		?>

		<div align="left" style="margin-left: 15px">
			<small><b><?php echo $texto_adicional ?> : </b>
				<?php 
				for($i2=0; $i2 < $total_reg2; $i2++){
					foreach ($res2[$i2] as $key => $value){}
						$id_temp = $res2[$i2]['id'];				
					$id_item = $res2[$i2]['id_item'];		

					$query3 =$pdo->query("SELECT * FROM adicionais where id = '$id_item'");
					$res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
					$total_reg3 = @count($res3);
					$nome_adc = $res3[0]['nome'];
					echo $nome_adc;
					if($i2 < ($total_reg2 - 1)){
						echo ', ';
					}
				}
				?>
			</small>
		</div>

	<?php } ?>



	<?php 

	$query2 =$pdo->query("SELECT * FROM temp where carrinho = '$id_car' and tabela = 'ingredientes'");
	$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
	$total_reg2 = @count($res2);
	if($total_reg2 > 0){
		if($total_reg2 > 1){
			$texto_adicional = $nome_prod .' ('.$total_reg2.') Retirar Ingredientes';
		}else{
			$texto_adicional = $nome_prod .' ('.$total_reg2.') Retirar Ingrediente';
		}
		?>
		<div align="left" style="margin-left: 15px">
			<small><b><?php echo $texto_adicional ?> : </b>
				<?php 
				for($i2=0; $i2 < $total_reg2; $i2++){
					foreach ($res2[$i2] as $key => $value){}
						$id_temp = $res2[$i2]['id'];				
					$id_item = $res2[$i2]['id_item'];		

					$query3 =$pdo->query("SELECT * FROM ingredientes where id = '$id_item'");
					$res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
					$total_reg3 = @count($res3);
					$nome_adc = $res3[0]['nome'];
					echo $nome_adc;
					if($i2 < ($total_reg2 - 1)){
						echo ', ';
					}
				}
				?>
			</small>
		</div>
	<?php } ?>


	<?php 

	if($obs_item != ""){
		?>	
		<div align="left" style="margin-left: 15px">
			<small><b>Observação : </b>
				<?php echo $obs_item ?>
			</small>		
		</div>
	<?php } ?>


<?php } } ?>

	<?php 

	$query2 =$pdo->query("SELECT * FROM temp where carrinho = '$id_carrinho' and tabela = 'adicionais'");
	$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
	$total_reg2 = @count($res2);
	if($total_reg2 > 0){
		if($total_reg2 > 1){
			$texto_adicional = '('.$total_reg2.') Adicionais';
		}else{
			$texto_adicional = '('.$total_reg2.') Adicional';
		}
		?>

		<div align="left" style="margin-left: 15px">
			<small><b><?php echo $texto_adicional ?> : </b>
				<?php 
				for($i2=0; $i2 < $total_reg2; $i2++){
					foreach ($res2[$i2] as $key => $value){}
						$id_temp = $res2[$i2]['id'];				
					$id_item = $res2[$i2]['id_item'];		

					$query3 =$pdo->query("SELECT * FROM adicionais where id = '$id_item'");
					$res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
					$total_reg3 = @count($res3);
					$nome_adc = $res3[0]['nome'];
					echo $nome_adc;
					if($i2 < ($total_reg2 - 1)){
						echo ', ';
					}
				}
				?>
			</small>
		</div>

	<?php } ?>



	<?php 

	$query2 =$pdo->query("SELECT * FROM temp where carrinho = '$id_carrinho' and tabela = 'ingredientes'");
	$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
	$total_reg2 = @count($res2);
	if($total_reg2 > 0){
		if($total_reg2 > 1){
			$texto_adicional = '('.$total_reg2.') Retirar Ingredientes';
		}else{
			$texto_adicional = '('.$total_reg2.') Retirar Ingrediente';
		}
		?>
		<div align="left" style="margin-left: 15px">
			<small><b><?php echo $texto_adicional ?> : </b>
				<?php 
				for($i2=0; $i2 < $total_reg2; $i2++){
					foreach ($res2[$i2] as $key => $value){}
						$id_temp = $res2[$i2]['id'];				
					$id_item = $res2[$i2]['id_item'];		

					$query3 =$pdo->query("SELECT * FROM ingredientes where id = '$id_item'");
					$res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
					$total_reg3 = @count($res3);
					$nome_adc = $res3[0]['nome'];
					echo $nome_adc;
					if($i2 < ($total_reg2 - 1)){
						echo ', ';
					}
				}
				?>
			</small>
		</div>
	<?php } ?>


	<?php 

	if($obs_item != ""){
		?>	
		<div align="left" style="margin-left: 15px">
			<small><b>Observação : </b>
				<?php echo $obs_item ?>
			</small>		
		</div>
	<?php } ?>

</div>


<?php } ?>

<div class="th" style="margin-bottom: 7px"></div>

<?php if($entrega == "Delivery"){ ?>
	<div class="row valores">			
		<div class="col-6">Total</div>
		<div class="col-6" align="right">R$ <?php echo @$valor_dos_itensF ?></div>
	</div>			
<?php } ?>	

<?php if($entrega == "Delivery"){ ?>
	<div class="row valores">			
		<div class="col-6">Frete</div>
		<div class="col-6" align="right">R$ <?php echo @$taxa_entregaF ?></div>	
	</div>			
<?php } ?>		

<div class="row valores">			
	<div class="col-6">SubTotal</div>
	<div class="col-6" align="right">R$ <b><?php echo @$valorF ?></b></div>	
</div>	


</tr>


<?php if($total_pago != $valor){ ?>
	<div class="row valores">			
		<div class="col-6">Valor Recebido</div>
		<div class="col-6" align="right">R$ <?php echo @$total_pagoF ?></div>	
	</div>			
<?php } ?>

<?php if($troco > 0){ ?>
	<div class="row valores">			
		<div class="col-6">Troco</div>
		<div class="col-6" align="right">R$ <?php echo @$trocoF ?></div>	
	</div>			
<?php } ?>	

<div class="th" style="margin-bottom: 7px"></div>

<div class="row valores">			
	<div class="col-6">Forma de Pagamento</div>
	<div class="col-6" align="right"><?php echo @$tipo_pgto ?></div>	
</div>	

<div class="row valores">			
	<div class="col-6">Forma de Entrega</div>
	<div class="col-6" align="right"><?php echo @$entrega ?></div>	
</div>


<div class="row valores">			
	<div class="col-6">Está Pago</div>
	<div class="col-6" align="right"><b><?php echo @$pago ?></b></div>	
</div>

<div class="th" style="margin-bottom: 10px"></div>


<?php if($entrega == "Delivery"){ ?>
	<div class="valores" align="center">
		<b>Endereço	para Entrega</b>		
			<br>
			<?php echo $rua_cliente ?> <?php echo $numero_cliente ?> <?php echo $complemento_cliente ?>
			<?php echo $bairro_cliente ?>
		</div>	
<div class="th" style="margin-bottom: 10px"></div>
<?php } ?>	


<?php if($obs != ""){ ?>
	<div class="valores" align="center">
		<b>Observações do Pedido</b>		
			<br>			
			<?php echo $obs ?>
		</div>	
<div class="th" style="margin-bottom: 10px"></div>
<?php } ?>	