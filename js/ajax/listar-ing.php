<?php 
@session_start();
require_once('../../sistema/conexao.php');
$id = $_POST['id'];

$sessao = @$_SESSION['sessao_usuario'];

$query =$pdo->query("SELECT * FROM ingredientes where produto = '$id' and ativo = 'Sim'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

echo <<<HTML

	<div class="titulo-itens-2">
	Remover Ingredientes?
	</div>
	<ol class="list-group" id="listar-adicionais">
HTML;

	for($i=0; $i < $total_reg; $i++){
		foreach ($res[$i] as $key => $value){}
			$id = $res[$i]['id'];				
				$nome_ing = $res[$i]['nome'];

		$query2 =$pdo->query("SELECT * FROM temp where sessao = '$sessao' and id_item = '$id' and tabela = 'ingredientes' and carrinho = '0'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$total_reg2 = @count($res2);

		if($total_reg2 == 0){
			$icone = 'bi-check-square-fill';
			$titulo_link = 'Remover Ingrediente';
			$acao = 'Não';			

		}else{
			$icone = 'bi-square';
			$titulo_link = 'Adicionar Ingrediente';
			$acao = 'Sim';

		}

echo <<<HTML

		<a href="#" onclick="adicionarIng('{$id}', '{$acao}')" class="link-neutro" title="{$titulo_link}">
		<li class="list-group-item">		    	
		{$nome_ing}
		<i class="bi {$icone} direita"></i>			
		</li>
		</a>

HTML;


	}


echo <<<HTML

</ol>


HTML;

}