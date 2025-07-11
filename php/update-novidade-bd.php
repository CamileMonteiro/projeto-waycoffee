<?php
session_start();
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_REQUEST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $imagem_url = $_POST['imagem_url'];
    $data_publicacao = $_POST['data_publicacao'];


    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE novidades set titulo = ?, descricao = ?, imagem_url = ?, data_publicacao = ? WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($titulo, $descricao, $imagem_url, $data_publicacao, $id));
    Banco::desconectar();

    $_SESSION["mensagem"] = "Novidade $id atualizado com sucesso!";
    header("Location: ../painel-admin.php");
}
?>