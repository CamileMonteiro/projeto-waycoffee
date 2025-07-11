<?php
session_start();
include './header.php';
// Inclui o arquivo de conexão
require 'php/conexao.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
} else {
    if ($_SESSION['usuario_email'] != "admin@waycoffee.com") {
        header("Location: index.php");
    }
}

try {
    // Conecta ao banco de dados usando sua classe
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL para selecionar todos os produtos
    $sql = "SELECT * FROM usuarios ORDER BY id ASC";

    // Prepara a consulta
    $q = $pdo->prepare($sql);

    // Executa a consulta (sem parâmetros)
    $q->execute();

    // Busca TODOS os resultados como um array associativo
    $usuarios = $q->fetchAll(PDO::FETCH_ASSOC);

    // Desconecta do banco
    Banco::desconectar();

} catch (PDOException $e) {
    die("Erro ao consultar os usuários: " . $e->getMessage());
}
?>

<div class="container mt-4 mb-4">
    <?php include "mensagem.php" ?>

    <!-- Lista de usuários -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h4>Lista de Usuários
                            <a href="usuario-create.php" class="btn btn-primary float-end">Adicionar Usuário</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($usuarios as $usuario): ?>
                                <tr>

                                    <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                                    <td><?php echo htmlspecialchars($usuario['nome']); ?></td>
                                    <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                                    <td>
                                        <a href="usuario-update.php?id=<?php echo $usuario['id'] ?>"
                                            class="btn btn-success btn-sn">Editar</a>

                                        <form action="php/delete-usuario-bd.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_usuario"
                                                value="<?php echo htmlspecialchars($usuario['email']); ?>"
                                                class="btn btn-danger btn-sn">
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lista de produtos -->
    <?php include 'painel-produtos.php' ?>
    <?php include 'painel-novidades.php' ?>

</div>

<?php include './footer.php' ?>