<?php
@session_start(); 
require_once("cabecalho.php");
$url_completa = $_GET['url'];
$sabores = @$_GET['sabores'];

if($sabores == 1){
    $texto_sabor = ' (1º Sabor)';
}else if($sabores == 2){
$texto_sabor = ' (2º Sabor)';
}else{
    $texto_sabor = '';
}

if(@$_SESSION['sessao_usuario'] == ""){
	$sessao = date('Y-m-d-H:i:s-').rand(0, 1500);
	$_SESSION['sessao_usuario'] = $sessao;
}else{
	$sessao = $_SESSION['sessao_usuario'];
}

$texto_botao = 'Adicionar ao Carrinho';

if(@$_SESSION['id'] != ""){
	$id_usuario = $_SESSION['id'];
	$texto_botao = 'Adicionar ao Pedido';
	$nome_funcao = 'finalizarPedidoPainel()';
	$nome_funcao_segundo = 'selecionarSegundoPedido()';
	$nome_comprar_mais = 'comprarMaisPainel()';
}else{
	$id_usuario = '';
	$nome_funcao = 'finalizarPedido()';
	$nome_funcao_segundo = 'selecionarSegundo()';
	$nome_comprar_mais = 'comprarMais()';
}

$query = $pdo->query("SELECT * FROM carrinho where sessao = '$sessao'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$id_cliente = $res[0]['cliente'];
	$mesa_carrinho = $res[0]['mesa'];
	$nome_cli_pedido = $res[0]['nome_cliente'];


	$query = $pdo->query("SELECT * FROM clientes where id = '$id_cliente'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if(@count($res) > 0){
		$nome_cliente = $res[0]['nome'];
		$telefone_cliente = $res[0]['telefone'];
	}else{
		$nome_cliente = $nome_cli_pedido;
		$telefone_cliente = '';
	}
	
}

$separar_url = explode("_", $url_completa);
$url = $separar_url[0]; 
$item = @$separar_url[1];


$query = $pdo->query("SELECT * FROM produtos where url = '$url'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$nome = $res[0]['nome'];
	$descricao = $res[0]['descricao'];
	$foto = $res[0]['foto'];
	$id_prod = $res[0]['id'];
	$valor = $res[0]['valor_venda'];
	$valorF = number_format($valor, 2, ',', '.');
	$categoria = $res[0]['categoria'];
}

$query = $pdo->query("SELECT * FROM categorias where id = '$categoria'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$url_cat = $res[0]['url'];
}

$url_itens = '2sabores-'.$url_cat.'&sabores=2';

if($item == ""){
	$valor_item = $valor;
	$id_variacao = 0;
}else{
	$query = $pdo->query("SELECT * FROM variacoes where produto = '$id_prod' and nome = '$item'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$valor_item = $res[0]['valor'];
	$id_variacao = $res[0]['id'];
}

$query =$pdo->query("SELECT * FROM temp where sessao = '$sessao' and tabela = 'adicionais' and carrinho = '0'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	for($i=0; $i < $total_reg; $i++){
		foreach ($res[$i] as $key => $value){}
		$id_adc = $res[$i]['id_item'];

		$query2 =$pdo->query("SELECT * FROM adicionais where id = '$id_adc'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$valor_adc = $res2[0]['valor'];
		$valor_item += $valor_adc;	

}
}

$valor_itemF = number_format($valor_item, 2, ',', '.');


if($status_estabelecimento == "Fechado"){		
		echo "<script>window.alert('$texto_fechamento')</script>";
	echo "<script>window.location='index.php'</script>";
	exit();
}


$data = date('Y-m-d');
//verificar se está aberto hoje
$diasemana = array("Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado");
$diasemana_numero = date('w', strtotime($data));
$dia_procurado = $diasemana[$diasemana_numero];

//percorrer os dias da semana que ele trabalha
$query = $pdo->query("SELECT * FROM dias where dia = '$dia_procurado'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0){		
		echo "<script>window.alert('Estamos Fechados! Não funcionamos Hoje!')</script>";
	echo "<script>window.location='index.php'</script>";
	exit();
}

$hora_atual = date('H:i:s');
//verificar se o delivery está aberto dentro da hora prevista
if(strtotime($hora_atual) > strtotime($horario_abertura) and strtotime($hora_atual) < strtotime($horario_fechamento)){
	
}else{
	if(strtotime($hora_atual) > strtotime($horario_abertura) and strtotime($hora_atual) > strtotime($horario_fechamento)){
		
	}else{
			echo "<script>window.alert('$texto_fechamento_horario')</script>";
	echo "<script>window.location='index.php'</script>";
	exit();
	}
}


//verificar se o produto tem adicionais ou ingredientes
$query = $pdo->query("SELECT * FROM adicionais where produto = '$id_prod'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_adc = @count($res);

$query = $pdo->query("SELECT * FROM ingredientes where produto = '$id_prod'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_ing = @count($res);


?>

<style type="text/css">
	body{
		background:#f2f2f2;
	}
</style>


<div class="main-container" style="background:#fff;">

	<nav class="navbar bg-light fixed-top" style="box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.20);">
		<div class="container-fluid">
			<div class="navbar-brand" >
				<?php if($total_adc > 0 || $total_ing > 0){ ?>
				<a href="adicionais-<?php echo $url_completa ?>&sabores=<?php echo $sabores ?>"><big><i class="bi bi-arrow-left"></i></big></a>
				<?php }else{ ?>
				<a href="produto-<?php echo $url ?>&sabores=<?php echo $sabores ?>"><big><i class="bi bi-arrow-left"></i></big></a>
				<?php } ?>	
				<span style="margin-left: 15px">Resumo do Item</span>
			</div>

			<?php require_once("icone-carrinho.php") ?>

		</div>
	</nav>



	<div class="destaque">
		<b><?php echo mb_strtoupper($nome); ?></b> <small><small> <?php echo $texto_sabor ?></small></small>
	</div>

	<?php if($sabores != 2 and $sabores != 1){ ?>
	<div class="destaque-qtd">
		<b>QUANTIDADE</b>
		<span class="direita">
			<big>
				<span><a href="#" onclick="diminuirQuant()"><i class="bi bi-dash-circle-fill text-danger"></i></a></span>
				<span> <b><span id="quant"></span></b> </span>
				<span><a href="#" onclick="aumentarQuant()"><i class="bi bi-plus-circle-fill text-success"></i></a></span>
			</big>
		</span>
	</div>
	<?php } ?>

	<input type="hidden" id="quantidade" value="1">
	<input type="hidden" id="total_item_input" value="<?php echo $valor_item ?>">


	<div class="destaque-qtd">
		<b>OBSERVAÇÕES</b>
		<div class="form-group mt-3">
			<textarea maxlength="255" class="form-control" type="text" name="obs" id="obs"></textarea>
		</div>
	</div>

</div>


<div class="total-pedido">
	<span><b>TOTAL</b></span>
	<span class="direita">	<b>R$ <span id="total_item"><?php echo $valor_itemF ?></span></b></span>
</div>


<div class="d-grid gap-2 mt-4 abaixo">
	<a href='#' onclick="addCarrinho()" class="btn btn-primary botao-carrinho"><?php echo $texto_botao ?></a>
</div>


</body>
</html>



<div id="popup2" class="overlay2">
	<div class="popup2">
		<div class="row">
			<div class="col-12">
				<div class="card-add-carrinho">
					<a class="close" href="#">&times;</a>


					<form action="carrinho.php" method="post">						     
						<div class="row">								
							<div class="col-6"> 

								<?php if($id_usuario == ""){ ?>
									<div class="group">
										<input onkeyup="buscarNome()" type="text" class="input" name="telefone" id="telefone" required value="<?php echo @$telefone_cliente ?>">
										<span class="highlight"></span>
										<span class="bar"></span>
										<label class="label">Telefone</label>
									</div>
								<?php }else{ ?> 
									<div class="group">
											<select class="form-control" id="mesa" name="telefone" style="width:100%;" >
											<option value="0">Selecione uma Mesa</option> 

									<?php 
									$query = $pdo->query("SELECT * FROM mesas");
									$res = $query->fetchAll(PDO::FETCH_ASSOC);
									$total_reg = @count($res);
									if($total_reg > 0){
										for($i=0; $i < $total_reg; $i++){
										foreach ($res[$i] as $key => $value){}
										if($mesa_carrinho == $res[$i]['nome']){
											$selected = 'selected';
										}else{
											$selected = '';
										}	
										echo '<option value="'.$res[$i]['nome'].'" '.$selected.'>'.$res[$i]['nome'].'</option>';
										}
									}
									 ?>
									

								</select>   
										
									</div>
								<?php } ?>
								
							</div>


							<div class="col-6"> 
								<div class="group">
									<input onclick="buscarNome()" type="text" class="input" name="nome" id="nome" required value="<?php echo @$nome_cliente ?>">
									<span class="highlight"></span>
									<span class="bar"></span>
									<label class="label">Nome</label>
								</div>
							</div>
						</div>

						<?php if($sabores != 1){ ?>

						<div class="row" align="center">								
							<div class="col-6"> 
								<a href="#" onclick="<?php echo $nome_comprar_mais ?>" class="btn btn-primary" style="width:100%">Comprar Mais</a>
							</div>

							<div class="col-6"> 
								<a href="#" onclick="<?php echo $nome_funcao ?>" class="btn btn-success" style="width:100%">Finalizar Pedido</a>
							</div>

						</div>

					<?php }else{ ?>

							<div class="row" align="center">								
							<div class="col-12"> 
								<a href="#" onclick="<?php echo $nome_funcao_segundo ?>" class="btn btn-primary" style="width:100%">Selecionar Segundo Sabor</a>
							</div>							

						</div>
					<?php } ?>

						<br>
						<div id="mensagem" align="center"></div>

						
					</form>
				</div>
			</div>

		</div>
		
	</div>
</div>



<script type="text/javascript">
	$(document).ready(function() {    		
		var quant = $("#quantidade").val();		
		$("#quant").text(quant);
		
	} );

	function aumentarQuant(){
		var quant = $("#quantidade").val();
		var novo_valor = parseInt(quant) + parseInt(1);
		$("#quant").text(novo_valor)
		$("#quantidade").val(novo_valor);

		
		var total_quant = parseInt(quant) + parseInt(1);
		var total_inicial = '<?=$valor_item?>';		
		var total_it = parseFloat(total_inicial) * parseFloat(total_quant);
		$("#total_item").text(total_it.toFixed(2));
		$("#total_item_input").val(total_it);
	}

	function diminuirQuant(){
		var quant = $("#quantidade").val();
		if(quant > 1){
			var novo_valor = parseInt(quant) - parseInt(1);
			$("#quant").text(novo_valor)
			$("#quantidade").val(novo_valor)

		var total_quant = parseInt(quant) - parseInt(1);
		var total_inicial = '<?=$valor_item?>';		
		var total_it = parseFloat(total_inicial) * parseFloat(total_quant);
		$("#total_item").text(total_it.toFixed(2));
		$("#total_item_input").val(total_it);
		}

	}
	
</script>





<script type="text/javascript">
	
	


	function addCarrinho(){		
		var quantidade = $('#quantidade').val();
		var total_item = $('#total_item_input').val();
		var produto = "<?=$id_prod?>";
		var obs = $('#obs').val();
		var sabores = "<?=$sabores?>";
		var variacao = "<?=$id_variacao?>";
		
		 $.ajax({
        url: 'js/ajax/add-carrinho.php',
        method: 'POST',
        data: {quantidade, total_item, produto, obs, sabores, variacao},
        dataType: "text",

        success: function (mensagem) {  
        	
                  
            if (mensagem.trim() == "Inserido com Sucesso") {  

            window.location='carrinho';              
                          
            } 

        },      

    });
	}
</script>