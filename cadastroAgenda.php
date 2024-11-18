

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Agenda</title>
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <div class="container-cadastro">
        <h2>Cadastre um Contato</h2>
        <form method="POST" action="cadastroAgenda.php">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="tel" name="fone" placeholder="Fone" required>
            <button type="submit">Cadastrar</button>
            <a href="verAgenda.php">Voltar</a>
            
        </form>
        
        
    </div>
    
</body>
</html>
<?php
include "funcoesAgenda.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $fone = $_POST["fone"];
    salvarAgenda($nome, $fone);
    echo "<h4>Contato cadastrado com sucesso!</h4>";
}

if (isset($_GET["excluir"])) {
    excluirAgenda($_GET["excluir"]);
    header("Location: cadastroAgenda.php");
    exit;
}
?>




































