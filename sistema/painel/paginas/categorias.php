<?php 
//verificar se ele tem a permissão de estar nessa página
if(@$categorias == 'ocultar'){
    echo "<script>window.location='../index.php'</script>";
    exit();
}
$pag = 'categorias';
 ?>
<a class="btn btn-primary" onclick="inserir()" class="btn btn-primary btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i> Nova Categoria</a>


<div class="bs-example widget-shadow" style="padding:15px" id="listar">
	
</div>





<!-- Modal Inserir-->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><span id="titulo_inserir"></span></h4>
				<button id="btn-fechar" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
					<span aria-hidden="true" >&times;</span>
				</button>
			</div>
			<form id="form">
			<div class="modal-body">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleInputEmail1">Nome</label>
								<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>    
							</div> 	
						</div>
						<div class="col-md-6">

							<div class="form-group">
								<label for="exampleInputEmail1">Cor</label>
								<select class="form-control" id="cor" name="cor">
									<option value="azul">Azul</option>
									<option value="rosa">Rosa</option>
									<option value="azul-escuro">Azul Escuro</option>
									<option value="verde">Verde</option>
									<option value="roxo">Roxo</option>
									<option value="vermelho">Vermelho</option>
									<option value="verde-escuro">Verde Escuro</option>
									<option value="laranja">Laranja</option>
									<option value="amarelo">Amarelo</option>
								</select>
							</div> 	
						</div>
					</div>


					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label for="exampleInputEmail1">Descrição</label>
								<input maxlength="255" type="text" class="form-control" id="descricao" name="descricao" placeholder="Pequena Descrição" >    
							</div> 	
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Mais Sabores</label>
								<select class="form-control" id="mais_sabores" name="mais_sabores">
									<option value="Não">Não</option>
									<option value="Sim">Sim</option>
								</select>   
							</div> 	
						</div>
					
					</div>

					

						<div class="row">
							<div class="col-md-8">						
								<div class="form-group"> 
									<label>Foto</label> 
									<input class="form-control" type="file" name="foto" onChange="carregarImg();" id="foto">
								</div>						
							</div>
							<div class="col-md-4">
								<div id="divImg">
									<img src="images/<?php echo $pag ?>/sem-foto.jpg"  width="80px" id="target">									
								</div>
							</div>

						</div>


					
						<input type="hidden" name="id" id="id">

					<br>
					<small><div id="mensagem" align="center"></div></small>
				</div>

				<div class="modal-footer">      
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>

			
		</div>
	</div>
</div>







<script type="text/javascript">var pag = "<?=$pag?>"</script>
<script src="js/ajax.js"></script>



<script type="text/javascript">
	function carregarImg() {
    var target = document.getElementById('target');
    var file = document.querySelector("#foto").files[0];
    
        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }
</script>