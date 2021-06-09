<?php
    // Inicia a Sessão no arquivo
    session_start();

    // Obtem configuracoes banco
    require "config.php";

    // Puxa valores de email e senha do JavaScript
    $email = $_POST["emailLogin"];
    $senha = $_POST["senhaLogin"];

    // Seta query de autenticacao
    $resultado = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'");

    // Seta retorno padrao(negativo)
	$retorno["status"] = "n";
	$retorno["mensagem"] = "usuario nao cadastrado";
	$retorno["funcao"] = "login";

	if(mysqli_num_rows($resultado) > 0) {
        $registro = mysqli_fetch_assoc($resultado);

        // Seta atributos da sessao
        $_SESSION["id"] = session_id();
		$_SESSION["logado"] = true;
		$_SESSION["usuario"] = $email;
        $_SESSION["admin"] = $registro['tipoConta'];

        // Seta retorno positivo
		$retorno["status"] = "s";
		$retorno["mensagem"] = "usuario cadastrado";
	}

    // Imprime e da retorno ao JavaScript
    echo json_encode($retorno);
    
    /* Ver retorno do array $_SESSION
    print_r($_SESSION); */

?>