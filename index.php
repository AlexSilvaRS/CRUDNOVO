<?php
if (isset($_COOKIE['usuario_logado'])) {
    $usuario = htmlspecialchars($_COOKIE['usuario_logado']);
} else {
    header('Location:login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Agenda</h1> 
        <button><a href="verAgenda.php">Ver a Agenda</a></button>
        <a href="login.php">Voltar</a>
    </header>
    <?php
    include 'funcoesAgenda.php';
    carregarAgenda();
    ?>
</body>

</html>