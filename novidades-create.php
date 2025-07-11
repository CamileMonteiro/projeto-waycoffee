<?php
include './header.php';
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h4>Adicionar novidades
                            <a href="painel-admin.php" class="btn btn-primary float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="php/create-novidades-bd.php" method="POST">
                            <div class="mb-3">
                                <label>Título</label>
                                <input type="text" name="titulo" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Descrição</label>
                                <input type="text" name="descricao" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>URL da imagem</label>
                                <input type="text" name="imagem_url" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Data de Publicação</label>
                                <input type="date" name="data_publicacao" class="form-control">
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