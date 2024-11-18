<?php
include "funcoesAgenda.php";

// Verifica se o índice para edição foi enviado
if (isset($_GET['editar'])) {
    $index = $_GET['editar'];
    $agenda = carregarAgenda();

    // Verifica se o índice existe
    if (isset($agenda[$index])) {
        $nomeAtual = $agenda[$index]['nome'];
        $foneAtual = $agenda[$index]['fone'];
    } else {
        echo "Registro não encontrado.";
        exit;
    }
}

// Processa a alteração dos dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $index = $_POST["index"];
    $novoNome = $_POST["nome"];
    $novoFone = $_POST["fone"];

    alterarAgenda($index, $novoNome, $novoFone);
    header("Location: cadastroAgenda.php"); // Redireciona após salvar
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Contato</title>
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <div class="container-cadastro">
        <h2>Alterar Contato</h2>
        <form method="POST" action="alterarAgenda.php">
            <!-- Campo oculto para enviar o índice do contato -->
            <input type="hidden" name="index" value="<?php echo $index; ?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($nomeAtual); ?>" required>

            <label for="fone">Telefone:</label>
            <input type="tel" name="fone" id="fone" value="<?php echo htmlspecialchars($foneAtual); ?>" required>

            <button type="submit">Salvar Alterações</button>
        </form>
        <a href="cadastroAgenda.php">Voltar</a>
    </div>
</body>
</html>







































