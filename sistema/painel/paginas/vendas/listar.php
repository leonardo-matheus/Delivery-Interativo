<?php 
require_once("../../../conexao.php");
$tabela = 'vendas';
$data_hoje = date('Y-m-d');

$dataInicial = @$_POST['dataInicial'];
$dataFinal = @$_POST['dataFinal'];
$status = '%'.@$_POST['status'].'%';


$total_vendas = 0;

$query = $pdo->query("SELECT * FROM $tabela where data >= '$dataInicial' and data <= '$dataFinal' and status LIKE '$status' and pago = 'Sim'  order by data asc, hora desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

echo <<<HTML
	<small>
	<table class="table table-hover" id="tabela">
	<thead> 
	<tr> 
	<th>Cliente</th>	
	<th class="esc">Valor</th> 	
	<th class="esc">Total Pago</th> 
	<th class="esc">Troco</th>	
	<th class="esc">Forma PGTO</th> 	
	<th class="esc">Data</th>	 	
	<th class="esc">Hora</th>		
	<th>Ações</th>
	</tr> 
	</thead> 
	<tbody>	
HTML;

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
	$nome_cliente_ped = $res[$i]['nome_cliente'];
	
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
			$telefone_cliente = $res2[0]['telefone'];
		}else{
			if($mesa != '0' and $mesa != ''){
				$nome_cliente = 'Mesa: '.$mesa;
			}else{
				$nome_cliente = $nome_cliente_ped;
			}
			$telefone_cliente = '';
		}


		if($status == 'Finalizado'){
			$classe_alerta = 'text-verde';	
			$total_vendas += $valor;	
			$classe_linha = '';	
		}else if($status == 'Cancelado'){
			$classe_alerta = 'text-danger';
			$total_vendas += 0;
			$classe_linha = 'text-muted';	
			
		}else{
			$classe_alerta = 'text-primary';
			$total_vendas += $valor;
			$classe_linha = '';			
		}



echo <<<HTML
<tr class="{$classe_linha}">
<td><i class="fa fa-square {$classe_alerta}"></i> <b>Pedido ({$id})</b> / {$nome_cliente}</td>
<td class="esc">R$ {$valorF}</td>
<td class="esc">R$ {$total_pagoF}</td>
<td class="esc">R$ {$trocoF}</td>
<td class="esc">{$tipo_pgto}</td>
<td class="esc">{$dataF}</td>
<td class="esc">{$hora}</td>
<td>	

		<big><a href="#" onclick="mostrar('{$nome_cliente}', '{$valorF}', '{$total_pagoF}', '{$trocoF}',  '{$dataF}', '{$hora}', '{$status}', '{$pago}', '{$obs}', '{$taxa_entregaF}', '{$tipo_pgto}', '{$nome_usuario_pgto}')" title="Ver Dados"><i class="fa fa-info-circle text-secondary"></i></a></big>



		<li class="dropdown head-dpdn2" style="display: inline-block;">
		<a title="Cancelar Venda" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><big><i class="fa fa-trash-o text-danger"></i></big></a>

		<ul class="dropdown-menu" style="margin-left:-230px;">
		<li>
		<div class="notification_desc2">
		<p>Confirmar Exclusão? <a href="#" onclick="excluir('{$id}')"><span class="text-danger">Sim</span></a></p>
		</div>
		</li>										
		</ul>
		</li>

		<big><a  href="#" onclick="gerarComprovante('{$id}')" title="Gerar Comprovante"><i class="fa fa-file-pdf-o text-primary"></i></a></big>
	
		</td>
</tr>
HTML;

}

$total_vendasF = number_format($total_vendas, 2, ',', '.');

echo <<<HTML
</tbody>
<small><div align="center" id="mensagem-excluir"></div></small>
</table>

<br>	
<div align="right">Total Vendas: <span class="text-verde">R$ {$total_vendasF}</span> </div>

</small>
HTML;


}else{
	echo '<small>Não possui nenhum registro Cadastrado!</small>';
}

?>

<script type="text/javascript">
	$(document).ready( function () {
    $('#tabela').DataTable({
    		"ordering": false,
			"stateSave": true
    	});
    $('#tabela_filter label input').focus();
} );
</script>


<script type="text/javascript">
	function mostrar(cliente, valor, total_pago, troco, data, hora, status, pago, obs, taxa_entrega, tipo_pgto, usuario_pgto){

		$('#nome_dados').text(cliente);
		$('#valor_dados').text(valor);
		$('#total_pago_dados').text(total_pago);
		$('#troco_dados').text(troco);
		$('#data_dados').text(data);
		$('#hora_dados').text(hora);
		$('#status_dados').text(status);
		$('#pago_dados').text(pago);
		$('#obs_dados').text(obs);
		$('#taxa_entrega_dados').text(taxa_entrega);
		$('#tipo_pgto_dados').text(tipo_pgto);
		$('#usuario_pgto_dados').text(usuario_pgto);		
	
		$('#modalDados').modal('show');
	}
</script>




<script type="text/javascript">
	function gerarComprovante(id){
		let a= document.createElement('a');
		                a.target= '_blank';
		                a.href= 'rel/comprovante.php?id='+ id + '&imp=Não';
		                a.click();
	}
</script>