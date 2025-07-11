<?php
session_start();
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $imagem_url = $_POST['imagem_url'];
    $data_publicacao = $_POST['data_publicacao'];

    if (isset($titulo) && isset($descricao) && isset($imagem_url) && isset($data_publicacao)) {

        try {
            $pdo = Banco::conectar();
            $sql = "INSERT INTO novidades (titulo, descricao, imagem_url, data_publicacao) VALUES (:titulo, :descricao, :imagem_url, :data_publicacao)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':imagem_url', $imagem_url);
            $stmt->bindParam(':data_publicacao', $data_publicacao);

            $stmt->execute();

            $_SESSION["mensagem"] = "Novidade cadastrado com sucesso!";
            header("Location: ../painel-admin.php");

        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                die("Erro: Esta novidade já está cadastrado.");
            } else {
                die("Erro ao cadastrar a novidade: " . $e->getMessage());
            }
        }
    }

} else {
    echo "Acesso inválido.";
}
?>