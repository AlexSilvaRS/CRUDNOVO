<?php
include "funcoesAgenda.php";

// Carrega a agenda
$agenda = carregarAgenda();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Agenda</title>
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <div class="container-cadastro">
        <h2>Agenda de Contatos</h2>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($agenda)): ?>
                    <?php foreach ($agenda as $index => $contato): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($contato['nome']); ?></td>
                            <td><?php echo htmlspecialchars($contato['fone']); ?></td>
                            <td>
                                <!-- Botão para alterar -->
                                <a href="alterarAgenda.php?editar=<?php echo $index; ?>">Alterar</a>
                                <!-- Botão de excluir -->
                                <a href="excluirAgenda.php?excluir=<?php echo $index; ?>">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">Nenhum contato encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <br>
        <a href="cadastroAgenda.php">Cadastrar Novo Contato</a>
        <a href="index.php">Voltar</a>
    </div>
</body>
</html>
