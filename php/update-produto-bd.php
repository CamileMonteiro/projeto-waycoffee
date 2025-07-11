<?php
session_start();
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_REQUEST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $imagem = $_POST['imagem'];


    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE produtos set nome = ?, preco = ?, descricao = ?, imagem = ? WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($nome, $preco, $descricao, $imagem, $id));
    Banco::desconectar();

    $_SESSION["mensagem"] = "Produto $id atualizado com sucesso!";
    header("Location: ../painel-admin.php");
}
?>