<?php 
@session_start();
require_once('../../sistema/conexao.php');

$sessao = @$_SESSION['sessao_usuario'];

$nome_produto2 = '';
$query = $pdo->query("SELECT * FROM carrinho where sessao = '$sessao' and id_sabor = 0");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$total_carrinho = 0;
if($total_reg > 0){
	for($i=0; $i < $total_reg; $i++){
		foreach ($res[$i] as $key => $value){}	

			$id = $res[$i]['id'];
		$total_item = $res[$i]['total_item'];
		$produto = $res[$i]['produto'];
		$quantidade = $res[$i]['quantidade'];
		$obs = $res[$i]['obs'];
		$item = $res[$i]['item'];
		$variacao = $res[$i]['variacao'];
		$valor_unit = $total_item / $quantidade;

		$total_carrinho += $total_item;


		$total_itemF = number_format($total_item, 2, ',', '.');
		$valor_unitF = number_format($valor_unit, 2, ',', '.');
		$total_carrinhoF = number_format($total_carrinho, 2, ',', '.');

		$query2 = $pdo->query("SELECT * FROM variacoes where id = '$variacao'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		if(@count(@$res2) > 0){
			$sigla_variacao = '('.$res2[0]['sigla'].')';			
		}else{
			$sigla_variacao = '';
		}

		$query2 = $pdo->query("SELECT * FROM produtos where id = '$produto'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		if(@count(@$res2) > 0){
			$nome_produto = $res2[0]['nome'];
			$foto_produto = $res2[0]['foto'];
		}else{
			$nome_produto2 = '';
			$query3 = $pdo->query("SELECT * FROM carrinho where id_sabor = '$item' and sessao = '$sessao' ");
$res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
$total_reg3 = @count($res3);
if($total_reg3 > 0){
	
	for($i3=0; $i3 < $total_reg3; $i3++){
		foreach ($res3[$i3] as $key => $value){}
		$prod = $res3[$i3]['produto'];

		$query2 = $pdo->query("SELECT * FROM produtos where id = '$prod'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		if(@count(@$res2) > 0){
			
			$foto_produto = $res2[0]['foto'];
			$cat_produto = $res2[0]['categoria'];
			if($i3 < $total_reg3 - 1){
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



		

		if($obs == ''){
			$classe_obs = 'text-warning';
		}else{
			$classe_obs = 'text-danger';
		}

echo <<<HTML

		
		<li class="list-group-item">
		<img src="sistema/painel/images/produtos/{$foto_produto}" width="30px">		    	
		<span class="nome-produto"><b>{$nome_produto} {$sigla_variacao}</b></span>

HTML;

$query2 = $pdo->query("SELECT * FROM temp where carrinho = '$id' and tabela = 'ingredientes'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$total_reg2 = @count($res2);
		if($total_reg2 > 0){

		for($i2=0; $i2 < $total_reg2; $i2++){
			foreach ($res2[$i2] as $key => $value){}
				$id_item = $res2[$i2]['id_item'];

			$query3 =$pdo->query("SELECT * FROM ingredientes where id = '$id_item'");
			$res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
			$nome_ingrediente = 'Sem '.$res3[0]['nome'];
			if($i2 < ($total_reg2 - 1) ){
				$nome_ingrediente = $nome_ingrediente. ', ';
			}

echo '<span class="text-danger ingredientes">'.$nome_ingrediente.'</span>';

}
}


$query5 = $pdo->query("SELECT * FROM temp where carrinho = '$id' and tabela = 'adicionais'");
		$res5 = $query5->fetchAll(PDO::FETCH_ASSOC);
		$total_reg5 = @count($res5);
		if($total_reg5 > 0){
			$classe_adc = '';
		}else{
			$classe_adc = 'ocultar';
		}

echo <<<HTML


			
			<a href="#" onclick="excluir('{$id}')" class="link-neutro"><i class="bi bi-x-lg direita"></i></a>

			<div id="popup-excluir{$id}" class="overlay-excluir">
			<div class="popup">
			<div class="row">
			<div class="col-12">
			Confirmar Exclusão? <a href="#" onclick="excluirCarrinho('{$id}')" class="text-danger link-neutro">Sim</a>
			</div>
			<div class="col-3">
			<a class="close" href="#" onclick="fecharExcluir('{$id}')">&times;</a>
			</div>
			</div>

			</div>
			</div>	


			
			<div class="carrinho-qtd">

			<div class="itens-carrinho-qtd">
				<a title="Observações do item" class="link-neutro" href="#" onclick="obs('{$nome_produto}', '{$obs}', '{$id}')"><i class="bi bi-card-text {$classe_obs}"></i></a>
			</div>

			<div class="itens-carrinho-qtd-adc {$classe_adc}">
				<a title="Ver Adicionais" class="link-neutro" href="#" onclick="adicionais('{$nome_produto}', '{$id}')"><i class="bi  bi-plus text-primary"></i><small><small>Adicionais</small></small></a>
			</div>

			<a href="#" onclick="mudarQuant('{$id}', '{$quantidade}', 'menos')" class="link-neutro">
			<div class="menos-mais">
			-
			</div>
			</a>


			<div class="qtd-item-carrinho">
			<span id="quant">{$quantidade}</span>
			</div>


			<a href="#" onclick="mudarQuant('{$id}', '{$quantidade}', 'mais')" class="link-neutro">
			<div class="menos-mais">
			+
			</div>
			</a>


			<div class="valor-carrinho-it">
			<small><b>R$ {$total_itemF}</b></small>
			</div>

			</div>


			</li>

HTML;

		} 

	}else{
		echo "<script>window.location='index'</script>";
	}


	?>

	<script type="text/javascript">
		$("#total-do-pedido").text("<?=$total_carrinhoF?>");

		function mudarQuant(id, quantidade, acao){
			$.ajax({
				url: 'js/ajax/mudar-quant-carrinho.php',
				method: 'POST',
				data: {id, quantidade, acao},
				dataType: "text",

				success: function (mensagem) {  

					if (mensagem.trim() == "Alterado com Sucesso") {                
						listarCarrinho();         
					} 

				},      

			});
		}


		function excluirCarrinho(id){

			$.ajax({
				url: 'js/ajax/excluir-carrinho.php',
				method: 'POST',
				data: {id},
				dataType: "text",

				success: function (mensagem) {  

					if (mensagem.trim() == "Excluido com Sucesso") {                
						listarCarrinho();         
					} 

				},      

			});
		}

		function excluir(id){
			var popup = 'popup-excluir' + id;
			document.getElementById(popup).style.display = 'block';
		}

		function fecharExcluir(id){
			var popup = 'popup-excluir' + id;
			document.getElementById(popup).style.display = 'none';
		}

		function obs(nome, obs, id){
			$('#obs').val('');
			$("#nome_item").text(nome)
			$("#obs").val(obs)
			$("#id_obs").val(id)
			 var myModal = new bootstrap.Modal(document.getElementById('modalObs'), {
        		//backdrop: 'static',
    		});
   			 myModal.show();

		}


		function adicionais(nome, id){			
			$("#nome_item_adc").text(nome)			
			listarAdicionais(id);

			var myModal = new bootstrap.Modal(document.getElementById('modalAdc'), {
        		//backdrop: 'static',
    		});
   			 myModal.show();			 

		}

		function listarAdicionais(id){

			$.ajax({
         url: 'js/ajax/listar-adc-carrinho.php',
        method: 'POST',
        data: {id},
        dataType: "html",

        success:function(result){
            $("#listar-adc-carrinho").html(result);
           
        }
    });

			

		}



	</script>