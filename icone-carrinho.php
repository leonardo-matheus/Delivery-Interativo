<a class="text-dark" href="#popup1">
					<div class="d-flex carrinho">
						<big><span class="bi bi-cart-fill">
							<small><small><small><span class="position-absolute top-3 start-90 translate-middle badge rounded-pill bg-danger">
								<span id="total-itens-carrinho"></span>			
							</span></small></small></small></span>
						</big>
					</div>
				</a>



<div id="popup1" class="overlay">
	<div class="popup">
		<div class="row">
			<div class="col-9">
				<h3 class="titulo-popup">SUB TOTAL <b>R$ <span id="total-carrinho-icone"></span></b></h3>
			</div>
			<div class="col-3">
				<a class="close" href="#">&times;</a>
			</div>
		</div>
		<hr class="linha">
		<div class="conteudo-popup">
				<ol class="list-group" style="margin-top: 10px; margin-bottom: 10px; overflow: scroll; height:100%; scrollbar-width: thin;" id="listar-itens-carrinho-icone">

		

	</ol>

	
	<hr style="margin:5px">
	<div class="" align="center">
		<i class="bi bi-cart text-primary"></i><a href='carrinho' class="text-primary" style="text-decoration: none"> Ver Carrinho</a>
	</div>


		</div>
	</div>
</div>



<script type="text/javascript">

	$(document).ready(function() {    		
    listarCarrinhoIcone()    
} );
	
function listarCarrinhoIcone(){
	
    $.ajax({
         url: 'js/ajax/listar-itens-carrinho-icone.php',
        method: 'POST',
        data: {},
        dataType: "html",

        success:function(result){
            $("#listar-itens-carrinho-icone").html(result);
           
        }
    });
}

</script>