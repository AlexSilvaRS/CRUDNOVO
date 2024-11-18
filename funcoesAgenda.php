<?php
function carregarAgenda() {
    $agenda = [];
    if (file_exists("agenda.txt")) {
        $linhas = file("agenda.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($linhas as $linha) {
            list($nome, $fone) = explode(":", $linha);
            $agenda[] = ["nome" => $nome, "fone" => $fone];
        }
    }
    return $agenda;
}

function salvarAgenda($nome, $fone) {
    $linha = $nome . ":" . $fone . PHP_EOL;
    file_put_contents("agenda.txt", $linha, FILE_APPEND);
}

function listarAgenda() {
    $agenda = carregarAgenda();
    echo "<table border='1'><tr><th>Nome</th><th>Telefone</th><th>Ações</th></tr>";
    foreach ($agenda as $index => $contato) {
        echo "<tr>
            <td>" . htmlspecialchars($contato["nome"]) . "</td>
            <td>" . htmlspecialchars($contato["fone"]) . "</td>
            <td>
                <a href='cadastroAgenda.php?excluir=$index'>Excluir</a> |
                <a href='alterarAgenda.php?alterar=$index'>Alterar</a>
            </td>
        </tr>";
    }
    echo "</table>";
}

function excluirAgenda($index) {
    $agenda = carregarAgenda();
    if (isset($agenda[$index])) {
        unset($agenda[$index]);
        file_put_contents("agenda.txt", "");
        foreach ($agenda as $contato) {
            salvarAgenda($contato["nome"], $contato["fone"]);
        }
    }
}

function alterarAgenda($index, $novoNome, $novoFone) {
    $agenda = carregarAgenda(); // Carregar a agenda correta
    if (isset($agenda[$index])) {
        $agenda[$index] = ["nome" => $novoNome, "fone" => $novoFone];
        file_put_contents("agenda.txt", ""); // Limpar o arquivo existente
        foreach ($agenda as $contato) {
            salvarAgenda($contato["nome"], $contato["fone"]);
        }
    }
}













































































