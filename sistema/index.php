<?php 
require_once("conexao.php");

$senha = '123';
$senha_crip = md5($senha);

//VERIFICAR SE EXISTE USUÁRIO ADMIN CADASTRADO
$query = $pdo->query("SELECT * FROM usuarios WHERE nivel = 'Administrador'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg == 0){
//CRIAR UM USUÁRIO ADMIN
$pdo->query("INSERT INTO usuarios SET nome = 'Administrador', email = '$email_sistema', cpf = '000.000.000-00', senha = '$senha', senha_crip = '$senha_crip', nivel = 'Administrador', ativo = 'Sim', data = curDate(), foto = 'sem-foto.jpg', telefone = '$telefone_sistema' ");
}


//VERIFICAR SE EXISTE CARGO ADMIN CADASTRADO
$query = $pdo->query("SELECT * FROM cargos WHERE nome = 'Administrador'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg == 0){
//CRIAR UM USUÁRIO ADMIN
$pdo->query("INSERT INTO cargos SET nome = 'Administrador'");
}


//APAGAR OS REGISTROS DOS DIAS ANTERIORES A 30 DIAS
$data_atual = date('Y-m-d');
$data_30_ant = date('Y-m-d', strtotime("-$dias_apagar days",strtotime($data_atual)));
$query = $pdo->query("SELECT * FROM temp WHERE data < '$data_30_ant'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
 for($i=0; $i < $total_reg; $i++){
    foreach ($res[$i] as $key => $value){}
        $id = $res[$i]['id'];
    	$pdo->query("DELETE FROM temp WHERE id = '$id'");
}
}


$query = $pdo->query("SELECT * FROM carrinho WHERE data < '$data_30_ant'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
 for($i=0; $i < $total_reg; $i++){
    foreach ($res[$i] as $key => $value){}
        $id = $res[$i]['id'];
    	$pdo->query("DELETE FROM carrinho WHERE id = '$id'");
}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $nome_sistema ?></title>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="shortcut icon" href="../img/<?php echo $favicon_sistema ?>" type="image/x-icon">

	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="../css/login.css">

</head>
<body>
	<div class="container mt-5">
		<div class="row d-flex justify-content-center">
			<div class="col-md-4">        	
				<div class="card px-5 py-5" id="form1">
					<div class="form-data" v-if="!submitted">
						<div class="logo">
							<img src="../img/<?php echo $logo_sistema ?>" width="100px">
						</div>
						<form method='POST' action='autenticar.php'>
							<div class="forms-inputs mb-4 "> <span>Email ou CPF</span> 
								<input autocomplete="off" type="text" v-model="email" v-bind:class="{'form-control':true, 'is-invalid' : !validEmail(email) && emailBlured}" v-on:blur="emailBlured = true" class='form-control' name="email" required>                      
							</div>
							<div class="forms-inputs mb-4 "> <span>Senha</span> 
								<input autocomplete="off" type="password" v-model="password" v-bind:class="{'form-control':true, 'is-invalid' : !validPassword(password) && passwordBlured}" v-on:blur="passwordBlured = true" class='form-control' name="senha" required>

							</div>
							<div class="mb-3"> 
								<button type="submit" class="btn btn-dark w-100">Login</button>
							</div>


							<div class="mb-3" align="center"> 
								<a href="" class="link-rec" data-bs-toggle="modal" data-bs-target="#modal-rec">Recuperar Senha</a>
							</div>



						</form>
					</div>
					<div class="success-data" v-else>

					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>





<!-- Modal -->
<div class="modal fade" id="modal-rec" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recuperar Senha</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<form id="form-rec">
        <div class="row">
        	<div class="col-8">
        		<input type="email" name="email-rec" id="email-recuperar" class="form-control" placeholder="Digite seu Email" required>
        	</div>
        	<div class="col-4">
        		 <button type="submit" class="btn btn-primary" style="height:40px">Recuperar</button>
        	</div>

        </div>
        <br>
        	<small><div id="mensagem-recuperar"></div></small>
    	</form>
      </div>
     
    </div>
  </div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


 <script type="text/javascript">
	$("#form-rec").submit(function () {

		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: "recuperar-senha.php",
			type: 'POST',
			data: formData,

			success: function (mensagem) {
				$('#mensagem-recuperar').text('');
				$('#mensagem-recuperar').removeClass()
				if (mensagem.trim() == "Recuperado com Sucesso") {
					//$('#btn-fechar-rec').click();					
					$('#email-recuperar').val('');
					$('#mensagem-recuperar').addClass('text-success')
					$('#mensagem-recuperar').text('Sua Senha foi enviada para o Email')			

				} else {

					$('#mensagem-recuperar').addClass('text-danger')
					$('#mensagem-recuperar').text(mensagem)
				}


			},

			cache: false,
			contentType: false,
			processData: false,

		});

	});
</script>



