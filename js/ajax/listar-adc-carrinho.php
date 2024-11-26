<?php 
@session_start();
require_once('../../sistema/conexao.php');
$id = $_POST['id'];
$id_sabor = @$_POST['id_sabor'];
$sessao = $_SESSION['sessao_usuario'];

if($id_sabor != 0){
	$query_car = $pdo->query("SELECT * FROM carrinho where sessao = '$sessao' and id_sabor = '$id_sabor'");
}else{
	$query_car = $pdo->query("SELECT * FROM carrinho where id = '$id'");
	$id_sabor = 0;
}

$res_car = $query_car->fetchAll(PDO::FETCH_ASSOC);
$total_reg_car = @count($res_car);
for($i_car=0; $i_car < $total_reg_car; $i_car++){
$quantidade = $res_car[$i_car]['quantidade'];
$id = $res_car[$i_car]['id'];
$item = $res_car[$i_car]['item'];

$query =$pdo->query("SELECT * FROM temp where carrinho = '$id' and tabela = 'adicionais'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

	for($i=0; $i < $total_reg; $i++){
		foreach ($res[$i] as $key => $value){}
			$id_temp = $res[$i]['id'];				
		$id_item = $res[$i]['id_item'];		

		$query2 =$pdo->query("SELECT * FROM adicionais where id = '$id_item'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$total_reg2 = @count($res2);
		$nome_adc = $res2[0]['nome'];
		$valor_adc = $res2[0]['valor'] * $quantidade;
		
		$valor_adcF = number_format($valor_adc, 2, ',', '.');	

echo <<<HTML

		<i class="bi bi-check-lg text-success"></i>
		{$nome_adc} <span class="text-danger">(R$ {$valor_adcF})</span>
		<a href="#" onclick="excluirAdc('{$id_temp}', '{$id}', '{$valor_adc}', '{$id_sabor}', '{$item}')"><i class="bi bi-trash text-danger"></i></a>
		<hr>

HTML;


	}

}

}
?>


<script type="text/javascript">
	function excluirAdc(id, carrinho, valor, id_sabor, item){
		

			$.ajax({
				url: 'js/ajax/excluir-adicionais.php',
				method: 'POST',
				data: {id, valor, carrinho, id_sabor, item},
				dataType: "text",

				success: function (mensagem) {  

					if (mensagem.trim() == "Excluido com Sucesso") {                
						listarAdicionais(carrinho, id_sabor);
						listarCarrinho();         
					} 

				},      

			});
		}
</script>