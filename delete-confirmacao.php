<?php
include './header.php';


$email = $_POST['delete_usuario'];

?>

<div class="container">
    <div class="span10 offset1 card p-4 mt-4 mb-4 bg-light">
        <div class="row">
            <h3 class="well">Excluir Contato</h3>
        </div>

        <form class="form-horizontal" action="php/delete-usuario-bd.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <div class="alert alert-danger"> Deseja excluir o contato?
            </div>
            <div class="form actions">
                <input type="hidden" name="delete_usuario" value="<?php echo $email; ?>" />
                <button type="submit" class="btn btn-danger">Sim</button>
                <a href="painel-admin.php" type="btn" class="btn btn-default">Não</a>

            </div>
        </form>
    </div>
</div>

<?php
include './footer.php'; ?>