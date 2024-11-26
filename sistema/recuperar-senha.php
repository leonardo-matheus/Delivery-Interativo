<?php 
require_once("conexao.php");
$email = $_POST['email-rec'];

//VERIFICAR SE EXISTE USUÁRIO ADMIN CADASTRADO
$query = $pdo->query("SELECT * FROM usuarios WHERE email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg == 0){
	echo 'Este email não está cadastrado!';
	exit();
}else{
	$senha = $res[0]['senha'];	
}

//enviar o email com a nova senha
$destinatario = $email;
$assunto = $nome_sistema . ' - Recuperação de Senha';
$mensagem = 'Sua senha é ' .$senha;
$cabecalhos = "From: ".$email_sistema;
   
@mail($destinatario, $assunto, $mensagem, $cabecalhos);

echo 'Recuperado com Sucesso';

 ?>
