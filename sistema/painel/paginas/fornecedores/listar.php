<?php 
require_once("../../../conexao.php");
$tabela = 'fornecedores';

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
	<th class="esc">Email</th> 
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
		$email = $res[$i]['email'];
		$endereco = $res[$i]['endereco'];		
		$data = $res[$i]['data'];
		$tipo_chave = $res[$i]['tipo_chave'];
	$chave_pix = $res[$i]['chave_pix'];


		$dataF = implode('/', array_reverse(explode('-', $data)));


		

echo <<<HTML
<tr class="">
<td>{$nome}</td>
<td class="esc">{$telefone}</td>
<td class="esc">{$email}</td>
<td class="esc">{$dataF}</td>

<td>
	<big><a href="#" onclick="editar('{$id}','{$nome}', '{$telefone}', '{$email}', '{$endereco}', '{$tipo_chave}', '{$chave_pix}')" title="Editar Dados"><i class="fa fa-edit text-primary"></i></a></big>

	<big><a href="#" onclick="mostrar('{$nome}', '{$telefone}', '{$email}', '{$endereco}', '{$dataF}', '{$tipo_chave}', '{$chave_pix}')" title="Ver Dados"><i class="fa fa-info-circle text-secondary"></i></a></big>


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
	function editar(id, nome, telefone, email, endereco, tipo_chave, chave_pix){
		$('#id').val(id);
		$('#nome').val(nome);
		$('#telefone').val(telefone);
		$('#email').val(email);
		$('#endereco').val(endereco);
		$('#tipo_chave').val(tipo_chave).change();
		$('#chave_pix').val(chave_pix);
					
		$('#titulo_inserir').text('Editar Registro');
		$('#modalForm').modal('show');
		
	}




	function mostrar(nome, telefone, email, endereco, data, tipo_chave, chave_pix){

		$('#nome_dados').text(nome);		
		$('#endereco_dados').text(endereco);
		$('#email_dados').text(email);		
		$('#data_dados').text(data);		
		$('#telefone_dados').text(telefone);		
		$('#tipo_chave_dados').text(tipo_chave);
		$('#chave_pix_dados').text(chave_pix);		
		
		$('#modalDados').modal('show');
	}


	function limparCampos(){
		$('#id').val('');
		$('#nome').val('');
		$('#telefone').val('');
		$('#endereco').val('');
		$('#email').val('');
		$('#chave_pix').val('');		
		
		
	}

</script>