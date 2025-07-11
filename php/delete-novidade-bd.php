<?php
session_start();
require 'conexao.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['delete_novidade'];


    if (isset($id)) {
        try {
            $pdo = Banco::conectar();
            $sql = "DELETE FROM novidades WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $id]);

            Banco::desconectar();

            $_SESSION["mensagem"] = "Novidade $id deletado com sucesso!";

            header("Location: ../painel-admin.php");

        } catch (PDOException $e) {
            die("Erro ao deletar o usuário: " . $e->getMessage());
        }
    }

} else {
    echo "Acesso inválido.";
}
?>