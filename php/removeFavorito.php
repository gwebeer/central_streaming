<?php	
	// Obtem configuracoes banco
    require "../php/config.php";

	// Puxa o email do usuario logado
    session_start();
    $email = $_SESSION['usuario'];

	// Puxa informacoes JavaScript
    $idTitulo = $_POST['idTitulo'];

	// Seta a query de atualizar dados
    $resultado = mysqli_query($conexao, "DELETE FROM `favoritos` WHERE email = '$email' AND idTitulo = '$idTitulo'");

	// Seta retorno padrao (negativo)
    $retorno["status"] = "n";
	$retorno["mensagem"] = "erro ao cadastrar usuario";
	$retorno["funcao"] = "cadastro";

	if($resultado == true) {
		// Seta retorno positivo
		$retorno["status"] = "s";
		$retorno["mensagem"] = "usuario cadastrado";
	}
	
	// Imprime e da retorno ao JavaScript
	echo json_encode($retorno);
?>