<?php
session_start();
require 'conexao.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Captura os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (isset($email) && isset($senha)) {
        try {
            $pdo = Banco::conectar();
            $sql = "SELECT id, email, senha, nome FROM usuarios WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // 2. VERIFICAR SE O USUÁRIO FOI ENCONTRADO E SE A SENHA CORRESPONDE
            if ($usuario && password_verify($senha, $usuario['senha'])) {
                // Senha está correta!

                // Armazena informações do usuário na sessão
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario_email'] = $usuario['email'];
                $_SESSION['loggedin'] = true;
                $_SESSION['last_activity'] = time();

                if ($usuario["email"] == "admin@waycoffee.com") {
                    header("Location: ../painel-admin.php");
                } else {
                    header("Location: ../painel-usuario.php");
                }

                exit();

            } else {
                // Usuário não encontrado ou senha incorreta
                echo "E-mail ou senha inválidos.";
            }

        } catch (PDOException $e) {
            die("Erro ao tentar fazer login: " . $e->getMessage());
        }
    }

} else {
    echo "Acesso inválido.";
}
?>