<?php

$email = $_POST["email"] ;
$senha = $_POST["senha"] ;

require "../php/config.php";

$sql = "UPDATE usuario SET senha = '$senha' WHERE email= '$email'";

if ($conexao->query($sql) === TRUE) {
  echo json_encode("Alteracao realizada");
} else {
  echo json_encode("Erro");
}
?>