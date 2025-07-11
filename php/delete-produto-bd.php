<?php
session_start();
require 'conexao.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['delete_produto'];


    if (isset($id)) {
        try {
            $pdo = Banco::conectar();
            $sql = "DELETE FROM produtos WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $id]);

            Banco::desconectar();

            $_SESSION["mensagem"] = "Produto $id deletado com sucesso!";

            header("Location: ../painel-admin.php");

        } catch (PDOException $e) {
            die("Erro ao deletar o usuário: " . $e->getMessage());
        }
    }

} else {
    echo "Acesso inválido.";
}
?>