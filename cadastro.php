<?php
include "funcoes.php";
// Processo cadastro usuario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"]) && isset($_POST["senha"])) {
    $novoUsuario = $_POST["usuario"];
    $novaSenha = $_POST["senha"];
    salvarUsuarios($novoUsuario, $novaSenha);
    echo " Usuario cadastrado com sucesso! ";
}
// Processa a exclusão do usuário
if (isset($_GET["excluir"])) {
    $index = $_GET["excluir"];
    excluirUsuario($index);
    header("location:cadastro.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
</head>

<body>
<form method="POST" action="login.php">
    <h2>
        Cadastre um novo usuário
    </h2><br>
        <input type="text" name="usuario" id="usuario" placeholder="usuario" required><br><br>
        <input type="password" name="senha" id="senha" placeholder="senha" required><br><br>
        <button type="submit">Cadastrar</button>
        <button><a href="login.php"></a>Logar</button>
    </form>

</body>

</html>