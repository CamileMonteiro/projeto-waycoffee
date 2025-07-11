<?php

include './header.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

?>

<main class="container my-5">
    <div class="card shadow-sm border-0">
        <section class="perfil-usuario p-4 rounded-top" style="background-color: #6f4e37; color: #ffffff;">
            <div class="row align-items-center">

                <div class="col">
                    <h2 class="h4 mb-0 fw-bold">Olá, <?php echo $_SESSION['usuario_nome'] ?> !</h2>
                </div>
            </div>
        </section>

        <section class="p-4">
            <h3 class="h4 fw-bold pb-2 mb-4 border-bottom">Seus Cupons de Desconto</h3>

            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card h-100 text-center"
                        style="border: 2px dashed #d4bda5; transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title h2" style="color: #6f4e37; font-weight: 700;">50% OFF</h4>
                            <p class="card-text">No seu próximo Frappuccino de Caramelo.</p>
                            <div class="mt-auto">
                                <p class="text-muted small mb-2">Válido até 31/07/2025</p>
                                <p class="card-text fs-5" style="color: #6f4e37; font-weight: 700;">CUPOM: CARAMELO50
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 text-center"
                        style="border: 2px dashed #d4bda5; transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title display-6" style="color: #6f4e37; font-weight: 700;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                    class="bi bi-cup-hot-fill me-1" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M.5 6a.5.5 0 0 0-.488.608l1.652 7.434A2.5 2.5 0 0 0 4.104 16h5.792a2.5 2.5 0 0 0 2.44-1.958l1.652-7.434A.5.5 0 0 0 13.5 6H.5zM13 5a2.5 2.5 0 0 1-.277-4.975A1.5 1.5 0 0 1 11.5 0h-7A1.5 1.5 0 0 1 3.277.025A2.5 2.5 0 0 1 3 5h10z" />
                                </svg>
                                Café Grátis
                            </h4>
                            <p class="card-text">Na compra de qualquer um de nossos bolos.</p>
                            <div class="mt-auto">
                                <p class="text-muted small mb-2">Válido até 15/08/2025</p>
                                <p class="card-text fs-5" style="color: #6f4e37; font-weight: 700;"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 text-center"
                        style="border: 2px dashed #d4bda5; transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title h2" style="color: #6f4e37; font-weight: 700;">R$ 10,00</h4>
                            <p class="card-text">De desconto em compras acima de R$ 50,00.</p>
                            <div class="mt-auto">
                                <p class="text-muted small mb-2">Válido até 25/07/2025</p>
                                <p class="card-text fs-5" style="color: #6f4e37; font-weight: 700;"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 text-center text-muted bg-light">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title h2 text-muted">2 por 1</h4>
                            <p class="card-text">Em todos os Espressos.</p>
                            <div class="mt-auto">
                                <p class="small mb-2 fw-semibold">Expirado em 10/06/2025</p>
                                <p class="card-text" style="color: #6f4e37; font-weight: 700;">Expirado</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php include './footer.php' ?>