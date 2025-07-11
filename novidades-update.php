<?php
include './header.php';
require 'php/conexao.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

try {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM novidades WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $novidade = $stmt->fetch(PDO::FETCH_ASSOC);

    Banco::desconectar();

} catch (PDOException $e) {
    die("Erro ao consultar as novidades: " . $e->getMessage());
}

?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h4>Adicionar Produto
                            <a href="painel-admin.php" class="btn btn-primary float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="php/update-novidade-bd.php?id=<?php echo $novidade['id'] ?>" method="POST">
                            <div class="mb-3">
                                <label>Título</label>
                                <input type="text" name="titulo" class="form-control"
                                    value="<?php echo !empty($novidade['titulo']) ? $novidade['titulo'] : ''; ?>"
                                    required>
                            </div>


                            <div class="mb-3">
                                <label>Descrição</label>
                                <input type="text" name="descricao" class="form-control"
                                    value="<?php echo !empty($novidade['descricao']) ? $novidade['descricao'] : ''; ?>"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label>URL da imagem</label>
                                <input type="text" name="imagem_url" class="form-control"
                                    value="<?php echo !empty($novidade['imagem_url']) ? $novidade['imagem_url'] : ''; ?>"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label>Data de Publicação</label>
                                <input type="date" name="data_publicacao" class="form-control"
                                    value="<?php echo !empty($novidade['data_publicacao']) ? $novidade['data_publicacao'] : ''; ?>"
                                    required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php' ?>