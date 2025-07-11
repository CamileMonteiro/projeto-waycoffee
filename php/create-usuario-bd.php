<?php
session_start();
require 'conexao.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Exibe os dados capturados (para fins de depuração)
    echo "<h1>Dados Recebidos</h1>";
    echo "<p><strong>Nome:</strong> " . htmlspecialchars($nome) . "</p>";
    echo "<p><strong>E-mail:</strong> " . htmlspecialchars($email) . "</p>";
    echo "<p><strong>Senha:</strong> " . htmlspecialchars($senha) . "</p>";

    if (isset($email) && isset($senha) && isset($nome)) {
        $senha_hash = password_hash($senha, PASSWORD_ARGON2ID);
        try {
            $pdo = Banco::conectar();
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha_hash);

            // Executa a instrução
            $stmt->execute();

            echo "Usuário cadastrado com sucesso!";
            $_SESSION["mensagem"] = "Usuário cadastrado com sucesso!";
            header("Location: ../painel-admin.php");

        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                die("Erro: Este endereço de e-mail já está cadastrado.");
            } else {
                die("Erro ao cadastrar o usuário: " . $e->getMessage());
            }
        }
    }

} else {
    echo "Acesso inválido.";
}
?>