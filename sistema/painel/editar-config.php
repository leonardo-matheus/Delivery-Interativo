<?php 
require_once("../conexao.php");

$nome_sistema = $_POST['nome_sistema'];
$email_sistema = $_POST['email_sistema'];
$telefone_sistema = $_POST['telefone_sistema'];
$telefone_fixo = $_POST['telefone_fixo'];
$endereco_sistema = $_POST['endereco_sistema'];
$instagram_sistema = $_POST['instagram_sistema'];
$tipo_rel = $_POST['tipo_rel'];
$tipo_miniatura = $_POST['tipo_miniatura'];
$status_whatsapp = $_POST['status_whatsapp'];
$previsao_entrega = $_POST['previsao_entrega'];
$horario_abertura = $_POST['horario_abertura'];
$horario_fechamento = $_POST['horario_fechamento'];
$texto_fechamento_horario = $_POST['texto_fechamento_horario'];
$status_estabelecimento = $_POST['status_estabelecimento'];
$texto_fechamento = $_POST['texto_fechamento'];
$tempo_atualizar = $_POST['tempo_atualizar'];
$tipo_chave = $_POST['tipo_chave'];
$chave_pix = $_POST['chave_pix'];
$cnpj_sistema = $_POST['cnpj_sistema'];
$dias_apagar = $_POST['dias_apagar'];
$impressao_automatica = $_POST['impressao_automatica'];
$fonte_comprovante = $_POST['fonte_comprovante'];
$banner_rotativo = $_POST['banner_rotativo'];


//validar troca da foto logo png
$query = $pdo->query("SELECT * FROM config");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$logo_sistema = $res[0]['logo_sistema'];
}else{
	$logo_sistema = 'logo.png';
}

//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['foto-logo']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/' .$nome_img;

$imagem_temp = @$_FILES['foto-logo']['tmp_name']; 

if(@$_FILES['foto-logo']['name'] != ""){
	$ext = pathinfo($nome_img, PATHINFO_EXTENSION);   
	if($ext == 'png'){ 
	
			//EXCLUO A FOTO ANTERIOR
			if($logo_sistema != "logo.png"){
				@unlink('../../img/'.$logo_sistema);
			}

			$logo_sistema = $nome_img;
		
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão de Imagem não permitida!';
		exit();
	}
}





//validar troca da foto favicon
$query = $pdo->query("SELECT * FROM config");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$favicon_sistema = $res[0]['favicon_sistema'];
}else{
	$favicon_sistema = 'favicon.png';
}

//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['foto-icone']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/' .$nome_img;

$imagem_temp = @$_FILES['foto-icone']['tmp_name']; 

if(@$_FILES['foto-icone']['name'] != ""){
	$ext = pathinfo($nome_img, PATHINFO_EXTENSION);   
	if($ext == 'png'){ 
	
			//EXCLUO A FOTO ANTERIOR
			if($favicon_sistema != "favicon.png"){
				@unlink('../../img/'.$favicon_sistema);
			}

			$favicon_sistema = $nome_img;
		
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão de Imagem não permitida!';
		exit();
	}
}






//validar troca da foto relatorio
$query = $pdo->query("SELECT * FROM config");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$logo_rel = $res[0]['logo_rel'];
}else{
	$logo_rel = 'logo_rel.jpg';
}

//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['foto-logo-rel']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/' .$nome_img;

$imagem_temp = @$_FILES['foto-logo-rel']['tmp_name']; 

if(@$_FILES['foto-logo-rel']['name'] != ""){
	$ext = pathinfo($nome_img, PATHINFO_EXTENSION);   
	if($ext == 'jpg'){ 
	
			//EXCLUO A FOTO ANTERIOR
			if($logo_rel != "logo_rel.jpg"){
				@unlink('../../img/'.$logo_rel);
			}

			$logo_rel = $nome_img;
		
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão de Imagem não permitida!';
		exit();
	}
}



$query = $pdo->prepare("UPDATE config SET nome_sistema = :nome_sistema, email_sistema = :email_sistema, telefone_sistema = :telefone_sistema, telefone_fixo = :telefone_fixo, endereco_sistema = :endereco_sistema, instagram_sistema = :instagram_sistema, tipo_rel = '$tipo_rel', tipo_miniatura = '$tipo_miniatura', status_whatsapp = '$status_whatsapp', previsao_entrega = '$previsao_entrega', horario_abertura = '$horario_abertura', horario_fechamento = '$horario_fechamento', texto_fechamento_horario = :texto_fechamento_horario, status_estabelecimento = '$status_estabelecimento', texto_fechamento = :texto_fechamento, logo_sistema = '$logo_sistema', favicon_sistema = '$favicon_sistema', logo_rel = '$logo_rel', tempo_atualizar = '$tempo_atualizar', tipo_chave = '$tipo_chave', chave_pix = :chave_pix, cnpj = :cnpj_sistema, dias_apagar = :dias_apagar, impressao_automatica = :impressao_automatica, fonte_comprovante = :fonte_comprovante, banner_rotativo = '$banner_rotativo' ");

$query->bindValue(":nome_sistema", "$nome_sistema");
$query->bindValue(":email_sistema", "$email_sistema");
$query->bindValue(":telefone_sistema", "$telefone_sistema");
$query->bindValue(":instagram_sistema", "$instagram_sistema");
$query->bindValue(":endereco_sistema", "$endereco_sistema");
$query->bindValue(":telefone_fixo", "$telefone_fixo");
$query->bindValue(":texto_fechamento_horario", "$texto_fechamento_horario");
$query->bindValue(":texto_fechamento", "$texto_fechamento");
$query->bindValue(":chave_pix", "$chave_pix");
$query->bindValue(":cnpj_sistema", "$cnpj_sistema");
$query->bindValue(":dias_apagar", "$dias_apagar");
$query->bindValue(":impressao_automatica", "$impressao_automatica");
$query->bindValue(":fonte_comprovante", "$fonte_comprovante");

$query->execute();

echo 'Editado com Sucesso';

 ?>