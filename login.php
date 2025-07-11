<?php
include './header.php';

$status = null;
if (!empty($_GET['status'])) {
    $status = $_REQUEST['status'];
}

?>

<div class="login">
    <div class="login-wrapper">
        <form class="login-form" action="php/login-processar.php" method="post">

            <?php if ($status == "session_expired"): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <p>Sua sessão expirou, entre novamente.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            endif;
            ?>
            <h1 class="login-title">LOGIN</h1>

            <input class="input-field" type="email" placeholder="E-mail" name="email" required>

            <input class="input-field" type="password" placeholder="Senha" name="senha" required>

            <button class="login-button" type="submit">Login</button>

            <div class="signup-link">
                <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
            </div>
        </form>
        </form>
    </div>
</div>

<?php include './footer.php' ?>