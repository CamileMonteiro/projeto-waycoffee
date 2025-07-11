<?php
include './header.php'
    ?>

<div class="login">
    <div class="login-wrapper">
        <form class="login-form" action="php/cadastro-processar.php" method="post">
            <h1 class="login-title">CADASTRO</h1>

            <input class="input-field" type="nome" placeholder="Nome" name="nome" required>

            <input class="input-field" type="email" placeholder="E-mail" name="email" required>

            <input class="input-field" type="password" placeholder="Senha" name="senha" required>

            <button class="login-button" type="submit">Cadastre-se</button>

        </form>
        </form>
    </div>
</div>

<?php include './footer.php' ?>