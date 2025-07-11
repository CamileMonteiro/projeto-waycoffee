<?php
session_start();
require 'conexao.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['delete_usuario'];


    if (isset($email)) {
        try {
            $pdo = Banco::conectar();
            $sql = "DELETE FROM usuarios WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':email' => $email]);

            Banco::desconectar();

            $_SESSION["mensagem"] = "Usuário deletado com sucesso";

            header("Location: ../painel-admin.php");

        } catch (PDOException $e) {
            die("Erro ao deletar o usuário: " . $e->getMessage());
        }
    }

} else {
    echo "Acesso inválido.";
}
?>