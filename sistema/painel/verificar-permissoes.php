<?php 
require_once("../conexao.php");
@session_start();
$id_usuario = $_SESSION['id'];


$home = 'ocultar';
$pedidos = 'ocultar';
$configuracoes = 'ocultar';
$novo_pedido = 'ocultar';

//grupo pessoas
$usuarios = 'ocultar';
$funcionarios = 'ocultar';
$clientes = 'ocultar';
$fornecedores = 'ocultar';


//grupo cadastros
$bairros = 'ocultar';
$cargos = 'ocultar';
$dias = 'ocultar';
$grupos = 'ocultar';
$acessos = 'ocultar';
$banner_rotativo = 'ocultar';
$mesas = 'ocultar';

//grupo produtos
$produtos = 'ocultar';
$categorias = 'ocultar';
$estoque = 'ocultar';
$saidas = 'ocultar';
$entradas = 'ocultar';


//grupo financeiro
$vendas = 'ocultar';
$compras = 'ocultar';
$pagar = 'ocultar';
$receber = 'ocultar';



//relatorios
$rel_produtos = 'ocultar';
$rel_vendas = 'ocultar';
$rel_contas = 'ocultar';
$rel_lucro = 'ocultar';




$query = $pdo->query("SELECT * FROM usuarios_permissoes where usuario = '$id_usuario'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	for($i=0; $i < $total_reg; $i++){
		foreach ($res[$i] as $key => $value){}
		$permissao = $res[$i]['permissao'];
		
		$query2 = $pdo->query("SELECT * FROM acessos where id = '$permissao'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$nome = $res2[0]['nome'];
		$chave = $res2[0]['chave'];
		$id = $res2[0]['id'];

		if($chave == 'home'){
			$home = '';
		}


		if($chave == 'pedidos'){
			$pedidos = '';
		}

		if($chave == 'configuracoes'){
			$configuracoes = '';
		}

		if($chave == 'novo_pedido'){
			$novo_pedido = '';
		}




		if($chave == 'usuarios'){
			$usuarios = '';
		}

		if($chave == 'funcionarios'){
			$funcionarios = '';
		}

		if($chave == 'clientes'){
			$clientes = '';
		}

		
		if($chave == 'fornecedores'){
			$fornecedores = '';
		}





		if($chave == 'bairros'){
			$bairros = '';
		}

		if($chave == 'cargos'){
			$cargos = '';
		}

		if($chave == 'dias'){
			$dias = '';
		}

		if($chave == 'grupos'){
			$grupos = '';
		}

		if($chave == 'acessos'){
			$acessos = '';
		}

		if($chave == 'banner_rotativo'){
			$banner_rotativo = '';
		}

		if($chave == 'mesas'){
			$mesas = '';
		}




		if($chave == 'produtos'){
			$produtos = '';
		}

		if($chave == 'categorias'){
			$categorias = '';
		}

		if($chave == 'estoque'){
			$estoque = '';
		}

		if($chave == 'saidas'){
			$saidas = '';
		}

		if($chave == 'entradas'){
			$entradas = '';
		}





		if($chave == 'compras'){
			$compras = '';
		}

		if($chave == 'vendas'){
			$vendas = '';
		}

		if($chave == 'pagar'){
			$pagar = '';
		}

		if($chave == 'receber'){
			$receber = '';
		}



		if($chave == 'rel_produtos'){
			$rel_produtos = '';
		}

		
		if($chave == 'rel_vendas'){
			$rel_vendas = '';
		}

	
		if($chave == 'rel_contas'){
			$rel_contas = '';
		}

		
		if($chave == 'rel_lucro'){
			$rel_lucro = '';
		}






	}

}



if($home != 'ocultar'){
	$pag_inicial = 'home';
}else{
	$query = $pdo->query("SELECT * FROM usuarios_permissoes where usuario = '$id_usuario' order by id asc limit 1");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);

	if($total_reg > 0){	
			$permissao = $res[0]['permissao'];		
			$query2 = $pdo->query("SELECT * FROM acessos where id = '$permissao'");
			$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);				
			$pag_inicial = $res2[0]['chave'];		

	}
}



if($usuarios == 'ocultar' and $funcionarios == 'ocultar' and $clientes == 'ocultar'  and $fornecedores == 'ocultar'){
	$menu_pessoas = 'ocultar';
}else{
	$menu_pessoas = '';
}



if($bairros == 'ocultar' and $cargos == 'ocultar' and $dias == 'ocultar' and $grupos == 'ocultar' and $acessos == 'ocultar' and $banner_rotativo == 'ocultar' and $mesas == 'ocultar'){
	$menu_cadastros = 'ocultar';
}else{
	$menu_cadastros = '';
}



if($produtos == 'ocultar' and $categorias == 'ocultar' and $estoque == 'ocultar' and $saidas == 'ocultar' and $entradas == 'ocultar'){
	$menu_produtos = 'ocultar';
}else{
	$menu_produtos = '';
}



if($compras == 'ocultar' and $vendas == 'ocultar' and $pagar == 'ocultar' and $receber == 'ocultar'){
	$menu_financeiro = 'ocultar';
}else{
	$menu_financeiro = '';
}





if($rel_produtos == 'ocultar' and $rel_lucro == 'ocultar' and $rel_contas == 'ocultar' and $rel_vendas == 'ocultar'){
	$menu_relatorio = 'ocultar';
}else{
	$menu_relatorio = '';
}




 ?>