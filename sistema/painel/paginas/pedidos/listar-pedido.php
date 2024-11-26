<?php 
require_once("../../../conexao.php");
$id = $_POST['id'];
?>

<style type="text/css">
	
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


<?php 
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
$nome_cliente = @$res2[0]['nome'];
$telefone_cliente = @$res2[0]['telefone'];
$rua_cliente = @$res2[0]['rua'];
$numero_cliente = @$res2[0]['numero'];
$complemento_cliente = @$res2[0]['complemento'];
$bairro_cliente = @$res2[0]['bairro'];

if($entrega == 'Retirar'){
	$entrega = 'Retirar no Local';
}

if($entrega == 'Consumir Local'){
	$entrega = 'Consumir no Local';
}

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


echo <<<HTML

	<div class="row itens">

		<div align="left" class="col-md-8"> {$quantidade} - {$nome_produto} {$sigla_variacao}

	</div>		

	<div align="right" class="col-md-4">
		R$ 
HTML;		
		$total_itemF = number_format($total_item , 2, ',', '.');
				// $total = number_format( $cp1 , 2, ',', '.');
		echo $total_itemF ;
echo <<<HTML
	</div>
HTML;


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

		//variacoes do item dois sabores

			$query2 =$pdo->query("SELECT * FROM temp where carrinho = '$id_car' and tabela = 'adicionais'");
	$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
	$total_reg2 = @count($res2);
	if($total_reg2 > 0){
		if($total_reg2 > 1){
			$texto_adicional = $nome_prod .' ('.$total_reg2.') Adicionais';
		}else{
			$texto_adicional = $nome_prod .' ('.$total_reg2.') Adicional';
		}
echo <<<HTML

		<div align="left" style="margin-left: 15px">
			<small><b>{$texto_adicional} : </b>
HTML;				
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
echo <<<HTML
			</small>
		</div>
HTML;
}

	$query2 =$pdo->query("SELECT * FROM temp where carrinho = '$id_car' and tabela = 'ingredientes'");
	$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
	$total_reg2 = @count($res2);
	if($total_reg2 > 0){
		if($total_reg2 > 1){
			$texto_adicional = $nome_prod .' ('.$total_reg2.') Retirar Ingredientes';
		}else{
			$texto_adicional = $nome_prod .' ('.$total_reg2.') Retirar Ingrediente';
		}
echo <<<HTML
		<div align="left" style="margin-left: 15px">
			<small><b>{$texto_adicional} : </b>
HTML;
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
echo <<<HTML
			</small>
		</div>
HTML;
}

if($obs_item != ""){
echo <<<HTML
		<div align="left" style="margin-left: 15px">
			<small><b>Observação : </b>
				{$obs_item}
			</small>		
		</div>
HTML;
}


}

}


	$query2 =$pdo->query("SELECT * FROM temp where carrinho = '$id_carrinho' and tabela = 'adicionais'");
	$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
	$total_reg2 = @count($res2);
	if($total_reg2 > 0){
		if($total_reg2 > 1){
			$texto_adicional = '('.$total_reg2.') Adicionais';
		}else{
			$texto_adicional = '('.$total_reg2.') Adicional';
		}
echo <<<HTML

		<div align="left" style="margin-left: 15px">
			<small><b>{$texto_adicional} : </b>
HTML;				
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
echo <<<HTML
			</small>
		</div>
HTML;
}

	$query2 =$pdo->query("SELECT * FROM temp where carrinho = '$id_carrinho' and tabela = 'ingredientes'");
	$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
	$total_reg2 = @count($res2);
	if($total_reg2 > 0){
		if($total_reg2 > 1){
			$texto_adicional = '('.$total_reg2.') Retirar Ingredientes';
		}else{
			$texto_adicional = '('.$total_reg2.') Retirar Ingrediente';
		}
echo <<<HTML
		<div align="left" style="margin-left: 15px">
			<small><b>{$texto_adicional} : </b>
HTML;
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
echo <<<HTML
			</small>
		</div>
HTML;
}

if($obs_item != ""){
echo <<<HTML
		<div align="left" style="margin-left: 15px">
			<small><b>Observação : </b>
				{$obs_item}
			</small>		
		</div>
HTML;
}
echo <<<HTML
</div>
HTML;
}
echo <<<HTML
<div class="th" style="margin-bottom: 7px"></div>
HTML;
if($entrega == "Delivery"){
echo <<<HTML
	<div class="row valores">			
		<div class="col-md-6">Total</div>
		<div class="col-md-6" align="right">R$ {$valor_dos_itensF}</div>
	</div>
HTML;			
}	

if($entrega == "Delivery"){
echo <<<HTML
	<div class="row valores">			
		<div class="col-md-6">Frete</div>
		<div class="col-md-6" align="right">R$ {$taxa_entregaF}</div>	
	</div>			
HTML;
}		
echo <<<HTML
<div class="row valores">			
	<div class="col-md-6">SubTotal</div>
	<div class="col-md-6" align="right">R$ <b>{$valorF}</b></div>	
</div>	


</tr>

HTML;
if($total_pago != $valor){
echo <<<HTML
	<div class="row valores">			
		<div class="col-md-6">Valor Recebido</div>
		<div class="col-md-6" align="right">R$ {$total_pagoF}</div>	
	</div>			
HTML;
}

if($troco > 0){
echo <<<HTML
	<div class="row valores">			
		<div class="col-md-6">Troco</div>
		<div class="col-md-6" align="right">R$ {$trocoF}</div>	
	</div>			
HTML;
}	
echo <<<HTML
<div class="th" style="margin-bottom: 7px"></div>

<div class="row valores">			
	<div class="col-md-6">Forma de Pagamento</div>
	<div class="col-md-6" align="right">{$tipo_pgto}</div>	
</div>	

<div class="row valores">			
	<div class="col-md-6">Forma de Entrega</div>
	<div class="col-md-6" align="right">{$entrega}</div>	
</div>


<div class="row valores">			
	<div class="col-md-6">Está Pago</div>
	<div class="col-md-6" align="right"><b>{$pago}</b></div>	
</div>

<div class="th" style="margin-bottom: 10px"></div>

HTML;
if($entrega == "Delivery"){
echo <<<HTML
	<div class="valores" align="center">
		<b>Endereço	para Entrega</b>		
			<br>
			{$rua_cliente} {$numero_cliente} {$complemento_cliente}
			{$bairro_cliente}
		</div>	
<div class="th" style="margin-bottom: 10px"></div>
HTML;
}

if($obs != ""){
echo <<<HTML
	<div class="valores" align="center">
		<b>Observação do Pedido</b>		
			<br>			
			{$obs}
		</div>	
<div class="th" style="margin-bottom: 10px"></div>
HTML;
}

 ?>