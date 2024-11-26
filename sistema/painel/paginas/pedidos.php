<?php 
@session_start();
require_once("verificar.php");
require_once("../conexao.php");

if(@$pedidos == 'ocultar'){
    echo "<script>window.location='../index.php'</script>";
    exit();
}


$pag = 'pedidos';

$segundos = $tempo_atualizar * 1000;

?>



<div class="bs-example widget-shadow" style="padding:15px; margin-top: -5px">

	<div class="row">
		<div class="col-md-12"  align="center">	
			<div > 
				<small >
					<a title="Todas as Vendas" class="text-muted" href="#" onclick="buscarContas('')"><span>Todos(<span id="todos_pedidos"></span>)</span></a> /
					<a title="Todas as Vendas" class="text-muted" href="#" onclick="buscarContas('Iniciado')"><i class="fa fa-square text-primary"></i> <span>Iniciado(<span id="ini_pedidos"></span>)</span></a> / 
					<a title="Vendas Pendentes" class="text-muted" href="#" onclick="buscarContas('Preparando')"><i class="fa fa-square text-danger"></i> <span>Preparando(<span id="prep_pedidos"></span>)</span></a> / 
					<a title="Vendas Pagas" class="text-muted" href="#" onclick="buscarContas('Entrega')"><i class="fa fa-square text-laranja"></i> <span>Em Rota Entrega(<span id="ent_pedidos"></span>)</span></a>
				</small>
			</div>
		</div>

		<input type="hidden" id="buscar-contas">
		<input type="hidden" id="id_pedido">

	</div>

	
	<hr>
	<div id="listar">

	</div>
	
</div>







<!-- Modal Dados-->
<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"><span id="nome_dados"></span></h4>
				<button id="btn-fechar-perfil" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
					<span aria-hidden="true" >&times;</span>
				</button>
			</div>
			
			<div class="modal-body" id="listar-pedido">							


			</div>

			
		</div>
	</div>
</div>





<!-- Modal Baixar-->
<div class="modal fade" id="modalBaixar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"><span id="nome_baixar"></span></h4>
				<button id="btn-fechar-baixar" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
					<span aria-hidden="true" >&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
			<form id="form-baixar">	
				<div class="row">
					<div class="col-md-8">
						<select class="form-control " id="pgto" name="pgto" style="width:100%;" > 
							<option value="Pix">Pix</option>
							<option value="Dinheiro">Dinheiro</option>
							<option value="Cartão de Débito">Cartão de Débito</option>
							<option value="Cartão de Crédito">Cartão de Crédito</option>

						</select>

						<input type="hidden" name="id" id="id_baixar">   
					</div>
					<div class="col-md-4">
						<button type="submit" class="btn btn-primary">Confirmar</button>
					</div>


				</div>
</form>

<br><small><div align="center" id="mensagem-baixar"></div></small>

			</div>
		</div>
	</div>



	<script type="text/javascript">var pag = "<?=$pag?>"</script>
	<script src="js/ajax.js"></script>

	<script type="text/javascript">
		var seg = '<?=$segundos?>';
		$(document).ready(function() {    
			setInterval(()=>{
				listar();
			}, seg);   
		} );

	</script>




	<script type="text/javascript">
		function listar(){		

			var status = $('#buscar-contas').val();
			var ult_pedido = $('#id_pedido').val();	

			$.ajax({
				url: 'paginas/' + pag + "/listar.php",
				method: 'POST',
				data: {status, ult_pedido},
				dataType: "html",

				success:function(result){
					$("#listar").html(result);
					$('#mensagem-excluir').text('');
				}
			});
		}
	</script>



	<script type="text/javascript">
		function listarPedido(id){		

			$.ajax({
				url: 'paginas/' + pag + "/listar-pedido.php",
				method: 'POST',
				data: {id},
				dataType: "html",

				success:function(result){
					$("#listar-pedido").html(result);           
				}
			});
		}
	</script>



	<script type="text/javascript">
		function buscarContas(status){
			$('#buscar-contas').val(status);
			listar();
		}
	</script>




	<script type="text/javascript">		

$("#form-baixar").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
       url: 'paginas/' + pag + "/baixar.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem-baixar').text('');
            $('#mensagem-baixar').removeClass()
            if (mensagem.trim() == "Baixado com Sucesso") {

                $('#btn-fechar-baixar').click();
                listar();          

            } else {

                $('#mensagem-baixar').addClass('text-danger')
                $('#mensagem-baixar').text(mensagem)
            }


        },

        cache: false,
        contentType: false,
        processData: false,

    });

});

	</script>