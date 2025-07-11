<?php

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

try {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM novidades ORDER BY id ASC";

    $q = $pdo->prepare($sql);

    $q->execute();

    // Busca TODOS os resultados como um array associativo
    $novidades = $q->fetchAll(PDO::FETCH_ASSOC);

    // Desconecta do banco
    Banco::desconectar();

} catch (PDOException $e) {
    die("Erro ao consultar as novidades: " . $e->getMessage());
}


?>
<!-- 
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h4>Lista de Novidades
                        <a href="novidades-create.php" class="btn btn-primary float-end">Adicionar Novidades</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Imagem url </th>
                                <th>Data de Publicação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($novidades as $novidade): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($novidade['id']); ?></td>
                                <td><?php echo htmlspecialchars($novidade['titulo']); ?></td>
                                <td><?php echo htmlspecialchars($novidade['descricao']); ?></td>
                                <td><?php echo htmlspecialchars($novidade['imagem_url']); ?></td>
                                <td><?php echo htmlspecialchars($novidade['data_publicacao']); ?></td>

                                <td>
                                    <a href="novidades-update.php?id=<?php echo $novidade['id'] ?>"
                                        class="btn btn-success btn-sn">Editar</a>
                                    <form action="php/delete-novidade-bd.php" method="POST" class="d-inline">
                                        <button type="submit" name="delete_novidade"
                                            value="<?php echo htmlspecialchars($novidade['id']); ?>"
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
</div> -->

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h4>Lista de Novidades
                        <a href="novidades-create.php" class="btn btn-primary float-end">Adicionar Novidades</a>
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th class="w-25">Descrição</th>
                                <th>Imagem URL</th>
                                <th>Data de Publicação</th>
                                <th class="w-25">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($novidades)): ?>
                            <?php foreach ($novidades as $novidade): ?>
                            <tr>
                                <td class="align-middle"><?php echo htmlspecialchars($novidade['id']); ?></td>
                                <td class="align-middle">
                                    <p class="mb-0"><?php echo htmlspecialchars($novidade['titulo']); ?></p>
                                </td>
                                <td class="align-middle">
                                    <p class="mb-0 text-break"><?php echo htmlspecialchars($novidade['descricao']); ?>
                                    </p>
                                </td>
                                <td class="align-middle">
                                    <a href="<?php echo htmlspecialchars($novidade['imagem_url']); ?>" target="_blank"
                                        class="text-break">
                                        <?php echo htmlspecialchars($novidade['imagem_url']); ?>
                                    </a>
                                </td>
                                <td class="align-middle"><?php echo htmlspecialchars($novidade['data_publicacao']); ?>
                                </td>

                                <td class="align-middle">
                                    <a href="novidades-update.php?id=<?php echo htmlspecialchars($novidade['id']); ?>"
                                        class="btn btn-success btn-sn">Editar</a>
                                    <form action="php/delete-novidade-bd.php" method="POST" class="d-inline">
                                        <button type="submit" name="delete_novidade"
                                            value="<?php echo htmlspecialchars($novidade['id']); ?>"
                                            class="btn btn-danger btn-sn"> Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Nenhuma novidade encontrada.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>