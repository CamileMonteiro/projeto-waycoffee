<?php

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

try {
    // Conecta ao banco de dados usando sua classe
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL para selecionar todos os produtos
    $sql = "SELECT * FROM produtos ORDER BY id ASC";

    // Prepara a consulta
    $q = $pdo->prepare($sql);

    // Executa a consulta (sem parâmetros)
    $q->execute();

    // Busca TODOS os resultados como um array associativo
    $produtos = $q->fetchAll(PDO::FETCH_ASSOC);

    // Desconecta do banco
    Banco::desconectar();

} catch (PDOException $e) {
    die("Erro ao consultar os produtos: " . $e->getMessage());
}


?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h4>Lista de Produtos
                        <a href="produto-create.php" class="btn btn-primary float-end">Adicionar Produto</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th class="w-25">Preço</th>
                                <th class="w-50">Descrição</th>
                                <th>Imagem (nome)</th>
                                <th class="w-25">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produtos as $produto): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($produto['id']); ?></td>
                                <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                                <td>R$ <?php echo htmlspecialchars($produto['preco']); ?></td>
                                <td><?php echo htmlspecialchars($produto['descricao']); ?></td>
                                <td><?php echo htmlspecialchars($produto['imagem']); ?></td>
                                <td>

                                    <a href="produto-update.php?id=<?php echo $produto['id'] ?>"
                                        class="btn btn-success btn-sn">Editar</a>

                                    <form action="php/delete-produto-bd.php" method="POST" class="d-inline">
                                        <button type="submit" name="delete_produto"
                                            value="<?php echo htmlspecialchars($produto['id']); ?>"
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