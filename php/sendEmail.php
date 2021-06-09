<?php
    // Verifica se é email de cadastro ou redefinição
    $operacao = $_POST['operacao'];

    if($operacao == 1) {
        echo "cadastro";
        // Puxa informacoes JavaScript
        $email = $_POST["email"];
        $numero = $_POST["numero"];

        // Seta informacoes do e-mail
        $tituloEmail = "Central Streaming | Confirme seu Cadastro!";

        $message = "Boa Noite, <br> <br>
        Seja muito bem vindo a nossa plataforma de streaming, tenha certeza de que somos gratos pelo seu cadastro e por isso realizamos melhorias pensando sempre em você. <br> <br>
        Somos conhecidos pela nossa variedade de catálogos, temos categorias de A a Z, fique por dentro de todas as nossas atualizações para ter um melhor proveito. <br> <br>
        Para acessar sua conta, confirme o código de seguranca " . $numero .
        "<br> <br>
        Att, <br> <br>
        Equipe da Central Streaming.";

    } else {
        echo "redefinir";
        // Puxa informacoes JavaScript
        $email = $_POST["emailRec"];

        // Seta informacoes do e-mail
        $tituloEmail = "Central Streaming | Esqueceu sua senha";

        $message = "Boa Noite, <br> <br>
        Recebemos seu pedido para redefinir a senha. <br> <br>
        Para redefinir sua senha, clique no botão abaixo: <br> <br>
        localhost/centralStreaming/html/forgotPassword.html <br> <br>
        Caso não tenha solicitado, favor ignorar a mensagem!. <br> <br>
        <br> <br>
        Att, <br> <br>
        Equipe da Central Streaming.";
    }

    // Envio de e-mail
    date_default_timezone_set('Etc/UTC');
    require '../php/PHPMailer/PHPMailerAutoload.php';
    $mail= new PHPMailer;
    $mail->IsSMTP(); 
    $mail->CharSet = 'UTF-8';   
    $mail->SMTPDebug = 2;       // 0 = nao mostra o debug, 2 = mostra o debug
    $mail->SMTPAuth = true;     
    $mail->SMTPSecure = 'ssl';  
    $mail->Host = 'smtp.gmail.com'; 
    $mail->Port = 465; 
    $mail->Username = 'suporte.centralstreaming'; 
    $mail->Password = 'Bsi12345';
    $mail->SetFrom($email, 'Central Streaming');
    $mail->addAddress($email,'');
    $mail->Subject = $tituloEmail;
    $mail->msgHTML($message);
    $mail->send();
?>