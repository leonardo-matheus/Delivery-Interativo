<?php 
require_once("../../../conexao.php");
$tabela = 'clientes';

$query = $pdo->query("SELECT * FROM $tabela order by id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

echo <<<HTML
	<small>
	<table class="table table-hover" id="tabela">
	<thead> 
	<tr> 
	<th>Nome</th>	
	<th class="esc">Telefone</th> 	
	<th class="esc">Localidade</th> 
	<th class="esc">Cadastro</th>
	
	<th>Ações</th>
	</tr> 
	</thead> 
	<tbody>	
HTML;

for($i=0; $i < $total_reg; $i++){
	foreach ($res[$i] as $key => $value){}
		$id = $res[$i]['id'];
		$nome = $res[$i]['nome'];
		$telefone = $res[$i]['telefone'];
		$rua = $res[$i]['rua'];
		$numero = $res[$i]['numero'];
		$bairro = $res[$i]['bairro'];
		$complemento = $res[$i]['complemento'];
		$data = $res[$i]['data'];


		$dataF = implode('/', array_reverse(explode('-', $data)));


		

echo <<<HTML
<tr class="">
<td>{$nome}</td>
<td class="esc">{$telefone}</td>
<td class="esc">{$bairro}</td>
<td class="esc">{$dataF}</td>

<td>
	<big><a href="#" onclick="editar('{$id}','{$nome}', '{$telefone}', '{$rua}', '{$numero}', '{$bairro}', '{$complemento}')" title="Editar Dados"><i class="fa fa-edit text-primary"></i></a></big>

	<big><a href="#" onclick="mostrar('{$nome}', '{$telefone}', '{$rua}', '{$numero}', '{$bairro}', '{$complemento}', '{$dataF}')" title="Ver Dados"><i class="fa fa-info-circle text-secondary"></i></a></big>


	<li class="dropdown head-dpdn2" style="display: inline-block;">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><big><i class="fa fa-trash-o text-danger"></i></big></a>

		<ul class="dropdown-menu" style="margin-left:-230px;">
		<li>
		<div class="notification_desc2">
		<p>Confirmar Exclusão? <a href="#" onclick="excluir('{$id}')"><span class="text-danger">Sim</span></a></p>
		</div>
		</li>										
		</ul>
		</li>



</td>
</tr>
HTML;

}

echo <<<HTML
	</tbody>
	<small><div align="center" id="mensagem-excluir"></div></small>
	</table>
	</small>
HTML;


}else{
	echo 'Não possui registros cadastrados!';
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
	function editar(id, nome, telefone, rua, numero, bairro, complemento){
		$('#id').val(id);
		$('#nome').val(nome);
		$('#telefone').val(telefone);
		$('#rua').val(rua);
		$('#numero').val(numero);
		$('#bairro').val(bairro).change();
		$('#complemento').val(complemento);
				
		$('#titulo_inserir').text('Editar Registro');
		$('#modalForm').modal('show');
		
	}




	function mostrar(nome, telefone, rua, numero, bairro, complemento, data){

		$('#nome_dados').text(nome);		
		$('#rua_dados').text(rua);
		$('#numero_dados').text(numero);
		$('#bairro_dados').text(bairro);
		$('#data_dados').text(data);
		$('#complemento_dados').text(complemento);
		$('#telefone_dados').text(telefone);		
		
		$('#modalDados').modal('show');
	}


	function limparCampos(){
		$('#id').val('');
		$('#nome').val('');
		$('#telefone').val('');
		$('#rua').val('');
		$('#complemento').val('');		
		$('#numero').val('');
		
	}

</script>