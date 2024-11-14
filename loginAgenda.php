<?php
include "funcoesAgenda.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $nomeValido = false;
    // Carrega os usuários do arquivo
    $agendas = carregarAgenda();
    // Vrifica se o usuário ou a senha estão no vetor de usuários
    foreach ($agendas as $user) {
        if ($user["nome"] === $nome &&
            $user["senha"] === $senha ){
            $nomeValido = true;
        break;
    }
}
if ($nomeValido) {
    // Define o cookie para o login por 5 minutos(300 segundos)
    setcookie("nome_logado", $nome, time() + 300, "/");
    header("location:index.php");
    exit;
} else {
    echo "Nome ou senha incorretos";
}
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login Agenda</h2>
    <form action="loginAgenda.php" method="POST">
    <input type="text" name="nome" id="nome" placeholder="Digite seu nome"><br><br>
    <input type="password" name="senha" id="senha" placeholder="Digite sua senha" require><br><br>
    <button type="submit">Entrar</button><br><br>

</form>
<a href="cadastroAgenda.php">Não tem cadastro? Clique aqui"</a></a>
</body>

</html>