<?php
session_start();
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $imagem = $_POST['imagem'];

    if (isset($nome) && isset($preco) && isset($descricao) && isset($imagem)) {

        try {
            $pdo = Banco::conectar();
            $sql = "INSERT INTO produtos (nome, preco, descricao, imagem) VALUES (:nome, :preco, :descricao, :imagem)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':imagem', $imagem);

            $stmt->execute();

            $_SESSION["mensagem"] = "Produto cadastrado com sucesso!";
            header("Location: ../painel-admin.php");

        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                die("Erro: Este produto já está cadastrado.");
            } else {
                die("Erro ao cadastrar o produto: " . $e->getMessage());
            }
        }
    }

} else {
    echo "Acesso inválido.";
}
?>