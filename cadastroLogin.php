<?php
include "funcoes.php";  // Inclui o arquivo de funções, se necessário

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $senhaConfirmacao = $_POST["senha_confirmacao"];
    
    // Valida se as senhas coincidem
    if ($senha !== $senhaConfirmacao) {
        $erroCadastro = "As senhas não coincidem!";
    } else {
        // Verifica se o usuário já existe
        $usuarios = carregarUsuarios();
        foreach ($usuarios as $user) {
            if ($user["usuario"] === $usuario) {
                $erroCadastro = "Usuário já cadastrado!";
                break;
            }
        }
        
        // Se não houve erro, salva o novo usuário
        if (!isset($erroCadastro)) {
            // Adiciona o novo usuário
            $novosUsuarios = carregarUsuarios();
            $novosUsuarios[] = ["usuario" => $usuario, "senha" => $senha];
            salvarUsuarios($novosUsuarios);
            header("location: login.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="container-cadastro">
        <form action="cadastro.php" method="POST">
            <h2>Cadastro de Usuário</h2><br>
            <input type="text" name="usuario" id="usuario" placeholder="Digite seu usuário" required><br><br>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required><br><br>
            <input type="password" name="senha_confirmacao" id="senha_confirmacao" placeholder="Confirme sua senha" required><br><br>
            <button type="submit">Cadastrar</button><br><br>
            <a href="login.php">Voltar</a>
            <?php if (isset($erroCadastro)): ?>
                <p class="error-message"><?php echo $erroCadastro; ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>
