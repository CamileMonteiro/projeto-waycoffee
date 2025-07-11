<?php include './header.php';
require 'php/conexao.php';

try {
    // Conecta ao banco de dados usando sua classe
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL para selecionar todos os produtos
    $sql = "SELECT * FROM novidades ORDER BY data_publicacao DESC";

    // Prepara a consulta
    $q = $pdo->prepare($sql);

    // Executa a consulta (sem parâmetros)
    $q->execute();

    // Busca TODOS os resultados como um array associativo
    $novidades = $q->fetchAll(PDO::FETCH_ASSOC);

    // Desconecta do banco
    Banco::desconectar();

} catch (PDOException $e) {
    die("Erro ao consultar as novidades: " . $e->getMessage());
}
?>


<div class="novidades-container">
    <h1 class="novidades-titulo">Nossas novidades</h1>
    <div class="lista-novidades">
        <?php if (!empty($novidades)): ?>
        <?php foreach ($novidades as $noticia): ?>
        <div class="noticia-card">

            <img class="noticia-img" src="<?php echo htmlspecialchars($noticia['imagem_url']); ?>"
                alt="<?php echo htmlspecialchars($noticia['titulo']); ?>">

            <div class="noticia-corpo">

                <h5 class="noticia-titulo">
                    <?= htmlspecialchars($noticia['titulo']) ?>
                </h5>
                <p class="noticia-descricao">
                    <?= htmlspecialchars($noticia['descricao']) ?>
                </p>
                <p class="noticia-data">
                    <small>
                        Publicado em: <?= date('d/m/Y', strtotime($noticia['data_publicacao'])) ?>
                    </small>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <div class="aviso">
            Nenhuma novidade encontrada no momento.
        </div>
        <?php endif; ?>
    </div>

</div>

<?php include './footer.php' ?>