<?php 
require_once("../../../conexao.php");
$tabela = 'usuarios';

$query = $pdo->query("SELECT * FROM $tabela where nivel != 'Administrador' order by id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

echo <<<HTML
	<small>
	<table class="table table-hover" id="tabela">
	<thead> 
	<tr> 
	<th>Nome</th>	
	<th class="esc">Email</th> 	
	<th class="esc">Telefone</th> 
	<th class="esc">Cargo</th>	
	<th class="esc">Foto</th>		
	<th>Ações</th>
	</tr> 
	</thead> 
	<tbody>	
HTML;

for($i=0; $i < $total_reg; $i++){
	foreach ($res[$i] as $key => $value){}
		$id = $res[$i]['id'];
		$nome = $res[$i]['nome'];
		$email = $res[$i]['email'];
		$cpf = $res[$i]['cpf'];
		$senha = $res[$i]['senha'];
		$nivel = $res[$i]['nivel'];
		$ativo = $res[$i]['ativo'];
		$data = $res[$i]['data'];
		$foto = $res[$i]['foto'];
		$telefone = $res[$i]['telefone'];
		$tipo_chave = $res[$i]['tipo_chave'];
	$chave_pix = $res[$i]['chave_pix'];

		if($nivel == 'Administrador'){
			$senha = '*********';
		}

		$dataF = implode('/', array_reverse(explode('-', $data)));


		if($ativo == 'Sim'){
			$icone = 'fa-check-square';
			$titulo_link = 'Desativar Item';
			$acao = 'Não';
			$classe_linha = '';
		}else{
			$icone = 'fa-square-o';
			$titulo_link = 'Ativar Item';
			$acao = 'Sim';
			$classe_linha = 'text-muted';
		}

echo <<<HTML
<tr class="{$classe_linha}">
<td>{$nome}</td>
<td class="esc">{$email}</td>
<td class="esc">{$telefone}</td>
<td class="esc">{$nivel}</td>
<td class="esc"><img src="images/perfil/{$foto}" width="30px"></td>
<td>
	<big><a href="#" onclick="editar('{$id}','{$nome}', '{$email}', '{$senha}', '{$nivel}', '{$foto}', '{$telefone}', '{$cpf}', '{$tipo_chave}', '{$chave_pix}')" title="Editar Dados"><i class="fa fa-edit text-primary"></i></a></big>

	<big><a href="#" onclick="mostrar('{$nome}', '{$email}', '{$cpf}', '{$senha}', '{$nivel}', '{$dataF}', '{$ativo}', '{$telefone}', '{$foto}', '{$tipo_chave}', '{$chave_pix}')" title="Ver Dados"><i class="fa fa-info-circle text-secondary"></i></a></big>


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
	function editar(id, nome, email, senha, nivel, foto, telefone, cpf, tipo_chave, chave_pix){
		$('#id').val(id);
		$('#nome').val(nome);
		$('#email').val(email);
		$('#telefone').val(telefone);
		$('#cpf').val(cpf);
		$('#cargo').val(nivel).change();
		$('#tipo_chave').val(tipo_chave).change();
		$('#chave_pix').val(chave_pix);
		
		
		$('#titulo_inserir').text('Editar Registro');
		$('#modalForm').modal('show');
		$('#foto').val('');
		$('#target').attr('src','images/perfil/' + foto);
	}




	function mostrar(nome, email, cpf, senha, nivel, data, ativo, telefone, foto, tipo_chave, chave_pix){

		$('#nome_dados').text(nome);
		$('#email_dados').text(email);
		$('#cpf_dados').text(cpf);
		$('#senha_dados').text(senha);
		$('#nivel_dados').text(nivel);
		$('#data_dados').text(data);
		$('#ativo_dados').text(ativo);
		$('#telefone_dados').text(telefone);
		$('#tipo_chave_dados').text(tipo_chave);
		$('#chave_pix_dados').text(chave_pix);	
		
		$('#target_mostrar').attr('src','images/perfil/' + foto);
		$('#modalDados').modal('show');
	}


	function limparCampos(){
		$('#id').val('');
		$('#nome').val('');
		$('#telefone').val('');
		$('#email').val('');
		$('#cpf').val('');		
		$('#foto').val('');
		$('#chave_pix').val('');
		$('#target').attr('src','images/perfil/sem-foto.jpg');
	}

</script>