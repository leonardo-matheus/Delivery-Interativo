<?php 
//verificar se ele tem a permissão de estar nessa página
if(@$dias == 'ocultar'){
    echo "<script>window.location='../index.php'</script>";
    exit();
}
$pag = 'dias';
 ?>
<a class="btn btn-primary" onclick="inserir()" class="btn btn-primary btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i> Novo Dia Fechado</a>


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
						<div class="col-md-12">
							<div class="form-group">
								<label for="exampleInputEmail1">Dia Fechado</label>
								<select class="form-control" name="dia" id="dia" style="width:100%;">
									<option value="Segunda-Feira">Segunda-Feira</option>
									<option value="Terça-Feira">Terça-Feira</option>
									<option value="Quarta-Feira">Quarta-Feira</option>
									<option value="Quinta-Feira">Quinta-Feira</option>
									<option value="Sexta-Feira">Sexta-Feira</option>
									<option value="Sábado">Sábado</option>
									<option value="Domingo">Domingo</option>

								</select>    
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

