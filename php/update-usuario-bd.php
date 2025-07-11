<?php
session_start();
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_REQUEST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $senha_hash = password_hash($senha, PASSWORD_ARGON2ID);

    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE usuarios set nome = ?, email = ?, senha = ? WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($nome, $email, $senha_hash, $id));
    Banco::desconectar();

    $_SESSION["mensagem"] = "Usuário atualizado com sucesso!";
    header("Location: ../painel-admin.php");
}
?>