<?php 
@session_start();
require_once('../../sistema/conexao.php');
$id = $_POST['id'];
$valor_item = $_POST['valor'];
$quant = $_POST['quant'];
$sessao = @$_SESSION['sessao_usuario'];



$query =$pdo->query("SELECT * FROM adicionais where produto = '$id' and ativo = 'Sim'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

echo <<<HTML

	<div class="titulo-itens">
	Inserir Adicionais?
	</div>
	<ol class="list-group" id="listar-adicionais">
HTML;

	for($i=0; $i < $total_reg; $i++){
		foreach ($res[$i] as $key => $value){}
			$id = $res[$i]['id'];				
		$nome_adc = $res[$i]['nome'];
		$valoradc = $res[$i]['valor'];
		$valoradcF = number_format($valoradc, 2, ',', '.');

		$query2 =$pdo->query("SELECT * FROM temp where sessao = '$sessao' and id_item = '$id' and tabela = 'adicionais' and carrinho = '0'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$total_reg2 = @count($res2);

		if($total_reg2 > 0){
			$icone = 'bi-check-square-fill';
			$titulo_link = 'Remover Adicional';
			$acao = 'Não';
			$valor_item += $valoradc;

		}else{
			$icone = 'bi-square';
			$titulo_link = 'Escolher Adicional';
			$acao = 'Sim';

		}

echo <<<HTML

		<a href="#" onclick="adicionar('{$id}', '{$acao}')" class="link-neutro" title="{$titulo_link}">
		<li class="list-group-item">		    	
		{$nome_adc} <span class="valor-item">(R$ {$valoradcF})</span>
		<i class="bi {$icone} direita"></i>			
		</li>
		</a>

HTML;


	}
$valor_itemF = number_format($valor_item, 2, ',', '.');

$valor_item_quant = $valor_item * $quant;
$valor_item_quantF = number_format($valor_item_quant, 2, ',', '.');

echo <<<HTML

</ol>

<div class="total">
	R$ <b><span id="valor_item_quantF">{$valor_item_quantF}</span></b>
</div>

<input type="hidden" id="total_item_input" value="{$valor_item_quant}">
<input type="hidden" id="total_item_input_adc" value="{$valor_itemF}">

HTML;

}