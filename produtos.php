<?php
include './header.php';
require 'php/conexao.php';

try {
    // Conecta ao banco de dados usando sua classe
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL para selecionar todos os produtos
    $sql = "SELECT * FROM produtos ORDER BY nome ASC";

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

<div class="produtos-container">
    <h1 class="produtos-titulo">Nossos Produtos</h1>

    <?php if (!empty($produtos)): ?>
    <div class="produtos">
        <?php foreach ($produtos as $produto): ?>
        <div class="produto">
            <img src="img/<?php echo htmlspecialchars($produto['imagem']); ?>.png"
                alt="<?php echo htmlspecialchars($produto['nome']); ?>">

            <h2 class="produtos-subtitulo"><?php echo htmlspecialchars($produto['nome']); ?></h2>

            <p class="produtos-preco">
                <strong>Preço:</strong>
                R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
            </p>

            <p class="produtos-descricao">
                <strong>Descrição:</strong>
                <?php echo htmlspecialchars($produto['descricao']); ?>
            </p>

        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <p>Nenhum produto encontrado no momento.</p>
    <?php endif; ?>
</div>

<?php include './footer.php' ?>