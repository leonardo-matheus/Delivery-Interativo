<?php 
require_once("cabecalho.php");
$url = $_GET['url'];

$query = $pdo->query("SELECT * FROM categorias where url = '$url'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
$nome = $res[0]['nome'];
$descricao = $res[0]['descricao'];
$id = $res[0]['id'];
$mais_sabores = $res[0]['mais_sabores'];

}


 ?>

<div class="main-container">

	<nav class="navbar bg-light fixed-top" style="box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.20);">
		<div class="container-fluid">
			<div class="navbar-brand" >
				<a href="index"><big><i class="bi bi-arrow-left"></i></big></a>
				<span style="margin-left: 15px"><?php echo mb_strtoupper($nome) ?></span>
			</div>

			<?php require_once("icone-carrinho.php") ?>

		</div>
	</nav>

<?php if($mais_sabores == 'Sim'){ ?>
<div class="sabores row" style="margin-top: 65px; margin-bottom: 10px">	
	<div class="col-6">
	<div class="sabores-itens" style="background-color: #e6f8ff">
	<img src="img/1sabor.png" width="35px"><br>
 1 Sabor
	</div>
</div>
	<div class="col-6">
	<a href="2sabores-<?php echo $url ?>" class="link-neutro">
	<div class="sabores-itens">
		<img src="img/2sabor.png" width="35px"><br>
2 Sabores
	</div>
	</a>
</div>
</div>
<ol class="list-group ">
<?php }else{ ?>
	<ol class="list-group " style="margin-top: 65px">
<?php } ?>

		<?php 
		$query = $pdo->query("SELECT * FROM produtos where categoria = '$id' and ativo = 'Sim'");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = @count($res);
		if($total_reg > 0){
			for($i=0; $i < $total_reg; $i++){
				foreach ($res[$i] as $key => $value){}
				$id = $res[$i]['id'];
				$foto = $res[$i]['foto'];
				$nome = $res[$i]['nome'];
				$descricao = $res[$i]['descricao'];
				$url = $res[$i]['url'];
				$estoque = $res[$i]['estoque'];
				$tem_estoque = $res[$i]['tem_estoque'];
				$valor = $res[$i]['valor_venda'];
				$valorF = number_format($valor, 2, ',', '.');

				if($tem_estoque == 'Sim' and $estoque <= 0){
					$mostrar = '';
					$url_produto = '#';					
				}else{
					$mostrar = 'ocultar';
					$url_produto = 'produto-'.$url;
				}

				$query2 = $pdo->query("SELECT * FROM variacoes where produto = '$id' and ativo = 'Sim'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$total_reg2 = @count($res2);		
		if($total_reg2 == 0){

			//verificar se o produto tem adicionais
$query3 = $pdo->query("SELECT * FROM adicionais where produto = '$id'");
$res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
$total_adc = @count($res3);
			if($total_adc > 0){
				if($tem_estoque == 'Sim' and $estoque <= 0){
					$url_produto = '#';
				}else{
					$url_produto = 'adicionais-'.$url.'&sabores='.$url;
				}
				
			}else{
				if($tem_estoque == 'Sim' and $estoque <= 0){
					$url_produto = '#';
				}else{
					$url_produto = 'observacoes-'.$url.'&sabores='.$url;
				}
				
			}
			
		}


				?>

		<a href="<?php echo $url_produto ?>" class="link-neutro">
		<li class="list-group-item d-flex justify-content-between align-items-start "> 
			
				<img class="<?php echo $mostrar ?>" src="img/esgotado.png" width="65px" height="65px" style="position:absolute; right:0; top:0px">
				<div class="row" style="width:100%">
					<div class="col-10">

				<div class="me-auto">
				<div class="fw-bold titulo-item"><?php echo $nome ?></div>
				<div class="subtitulo-item-menor"><?php echo $descricao ?></div>
				<span class="valor-item-maior">
					<?php 
$query2 = $pdo->query("SELECT * FROM variacoes where produto = '$id' and ativo = 'Sim'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$total_reg2 = @count($res2);		
		if($total_reg2 > 0){
			for($i2=0; $i2 < $total_reg2; $i2++){
				foreach ($res2[$i2] as $key => $value){}
					$sigla = $res2[$i2]['sigla'];
				$valorvar = $res2[$i2]['valor'];
				$valorvarF = number_format($valorvar, 2, ',', '.');

				echo '('.$sigla.') R$ '.$valorvarF;
				if($i2 < $total_reg2 - 1){
					echo ' / ';
				}

				 } 
				}else{
					echo 'R$ '.$valorF;
					
					}
				  ?>
				
			</span>
			</div>

			</div>
		

		<div class="col-2" style="margin-top: 10px;" align="right">
			<img class="" src="sistema/painel/images/produtos/<?php echo $foto ?>" width="60px" height="60px">
		</div>

	

</div>
			
		</li>
		</a>

	<?php } } ?>


		
	</ol>


</div>

</body>
</html>
