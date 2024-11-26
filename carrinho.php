<?php
@session_start(); 
require_once("cabecalho.php");

$sessao = $_SESSION['sessao_usuario'];

?>

<style type="text/css">
	body{
		background:#f2f2f2;
	}
</style>

<div class="main-container">

	<nav class="navbar bg-light fixed-top" style="box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.20);">
		<div class="container-fluid">
			<div class="navbar-brand" >
				<a href="index"><big><i class="bi bi-arrow-left"></i></big></a>
				<span style="margin-left: 15px">RESUMO DO PEDIDO</span>

			</div>

      <a class="text-dark" href="index.php" >
          <div class="d-flex carrinho" style="color:blue"> 
            <small><small>Comprar Mais?</small></small>
          </div>
        </a>

			

		</div>
	</nav>




	<ol class="list-group" style="margin-top: 65px; margin-bottom: 95px; overflow: scroll; height:100%; scrollbar-width: thin;" id="listar-itens-carrinho">

		

	</ol>





</div>


<div class="area-pedidos">
	<div class="total-pedido">
		<big>
		<span><b>SUB TOTAL</b></span>
		<span class="direita">	<b>R$ <span id="total-do-pedido"></span></b></span>
		</big>
	</div>


	<div class="d-grid gap-2 mt-4 abaixo">
		<a href='finalizar' class="btn btn-primary botao-carrinho">Finalizar Pedido</a>
	</div>
</div>


</body>
</html>





<!-- Modal -->
<div class="modal fade" id="modalObs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="nome_item"></span></h5>
        <button type="button" id="btn-fechar-obs" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form-obs">
      <div class="modal-body">
       <div class="destaque-qtd">
		<b>OBSERVAÇÕES</b>
		<div class="form-group mt-3">
			<textarea maxlength="255" class="form-control" type="text" name="obs" id="obs"></textarea>
		</div>
	</div>

	<input type="hidden" name="id" id="id_obs">
	<br><small><div id="mensagem-obs" align="center"></div></small>
      </div>
      <div class="modal-footer">       
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="modalAdc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="nome_item_adc"></span></h5>
        <button type="button" id="btn-fechar-adc" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">    
     	<div id="listar-adc-carrinho">
     		
     	</div>
      
    </div>
  </div>
</div>



<script type="text/javascript">

	$(document).ready(function() {    		
    listarCarrinho()    
} );
	
function listarCarrinho(){
	
    $.ajax({
         url: 'js/ajax/listar-itens-carrinho.php',
        method: 'POST',
        data: {},
        dataType: "html",

        success:function(result){
            $("#listar-itens-carrinho").html(result);
           
        }
    });
}

</script>


<script type="text/javascript">
	

$("#form-obs").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: 'js/ajax/editar-obs-carrinho.php',
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem-obs').text('');
            $('#mensagem-obs').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {
                $('#btn-fechar-obs').click();
                listarCarrinho();

            } else {

                $('#mensagem-obs').addClass('text-danger')
                $('#mensagem-obs').text(mensagem)
            }


        },

        cache: false,
        contentType: false,
        processData: false,

    });

});

</script>