<?php

$paginaAtiva = basename($_SERVER['PHP_SELF']);


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$timeout_duration = 200; //120

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {

    // Se o tempo de inatividade for maior que o permitido, destrói a sessão
    session_unset();
    session_destroy();

    // Redireciona para a página de login com uma mensagem
    header("Location: login.php?status=session_expired");
    exit;
}

$_SESSION['last_activity'] = time();



?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=Poppins:wght@100;300;400;500;700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Playfair+Display:wght@700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/sobrenos.css">
    <link rel="stylesheet" href="css/produtos.css">
    <link rel="stylesheet" href="css/novidades.css">

    <title>Way Coffee</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <a href="index.php" class="nav-logo">
                <h2 class="logo-text">☕ Way Coffee</h2>
            </a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php"
                        class="nav-link <?php echo ($paginaAtiva == 'index.php') ? 'ativo' : ''; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a href="produtos.php"
                        class="nav-link <?php echo ($paginaAtiva == 'produtos.php') ? 'ativo' : ''; ?>">Cardápio</a>
                </li>
                <li class="nav-item">
                    <a href="novidades.php"
                        class="nav-link <?php echo ($paginaAtiva == 'novidades.php') ? 'ativo' : ''; ?>">Novidades</a>
                </li>
                <li class="nav-item">
                    <a href="sobrenos.php"
                        class="nav-link <?php echo ($paginaAtiva == 'sobrenos.php') ? 'ativo' : ''; ?>">Sobre nós</a>
                </li>

                <?php
                // Verifica se o usuário está logado
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true):

                    // Uma vez que está logado, decidimos qual painel mostrar
                
                    // Verifica se o e-mail na sessão é o do administrador
                    if (isset($_SESSION['usuario_email']) && $_SESSION['usuario_email'] === 'admin@waycoffee.com'):
                        ?>
                <li class="nav-item">
                    <a href="painel-admin.php"
                        class="nav-link <?php echo ($paginaAtiva == 'painel-admin.php') ? 'ativo' : ''; ?>">
                        Painel Admin
                    </a>
                </li>
                <?php
                    else:
                        ?>
                <li class="nav-item">
                    <a href="painel-usuario.php"
                        class="nav-link <?php echo ($paginaAtiva == 'painel-usuario.php') ? 'ativo' : ''; ?>">
                        Meu Painel
                    </a>
                </li>
                <?php
                    endif; // Fim da verificação de admin/usuário
                
                    // O botão de Sair continua aparecendo para TODOS os usuários logados
                    ?>
                <li class="nav-item">
                    <a href="logout.php" class="btn btn-danger">Sair</a>
                </li>
                <?php

                    // Se não estiver logado, mostra o botão de Login
                else:
                    ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($paginaAtiva == 'login.php') ? 'ativo' : ''; ?>" href="login.php">
                        Login
                    </a>
                </li>
                <?php
                endif; // Fim da verificação de login
                ?>
            </ul>
        </nav>
    </header>