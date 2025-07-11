-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/07/2025 às 13:51
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `waycoffee_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `novidades`
--

CREATE TABLE `novidades` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `imagem_url` varchar(255) DEFAULT NULL,
  `data_publicacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `novidades`
--

INSERT INTO `novidades` (`id`, `titulo`, `descricao`, `imagem_url`, `data_publicacao`) VALUES
(2, 'Noite de Jazz e Café: Uma experiência sensorial única!', 'Prepare-se para uma noite inesquecível! Na próxima sexta-feira, teremos a honra de receber o talentoso quarteto de jazz ', 'https://i.pinimg.com/236x/ed/ff/45/edff45d34043b9ac8fe486c56700a056.jpg', '2025-06-20'),
(3, 'Café, Carinho e Patinhas: Feira de Adoção de Pets em nosso espaço!', 'No próximo sábado (28/06), nosso deck se transformará em um lar temporário para cãezinhos e gatinhos resgatados pela ONG Amigo Fiel. Venha tomar um café, se apaixonar e quem sabe encontrar um novo melhor amigo para levar para casa. Um evento para aquecer o coração e mudar vidas. Parte da venda de nossos expressos no dia será revertida para a ONG!', 'https://nfpet.com.br/blog/wp-content/uploads/2018/07/20-07-750x410.png', '2025-06-21'),
(8, 'Nosso Arraiá do Café Aconchego: Venha pular fogueira com a gente!', 'O mês mais gostoso do ano chegou e nossa cafeteria vai entrar no clima de Festa Junina! Nos dias 28 e 29 de junho (próximo sábado e domingo), teremos um cardápio especial com as melhores delícias da roça: Bolo de Fubá Cremoso, Canjica na tigela, e o nosso exclusivo \'Cappuccino Junino\' com doce de leite e canela. Nossa casa estará decorada com bandeirinhas, e o som será o melhor do forró pé-de-serra. Vista sua melhor camisa xadrez e venha festejar!', 'https://cdn.shopify.com/s/files/1/0834/2316/6766/files/Cafe_de_festa_Junina_480x480.webp?v=1741978874.jpg', '2025-06-21'),
(13, 'Doçura no Ar: Chegou o Novo Cappuccino de Chocolate Branco com Canela!', 'Prepare-se para se apaixonar! O Way Coffee traz uma novidade irresistível para adoçar o seu dia: o Cappuccino de Chocolate Branco com Canela. Cremoso, suave e com a doçura perfeita do chocolate branco, é a bebida ideal para qualquer momento. Venha experimentar essa delícia e deixe-se envolver por uma experiência única de sabor!', 'https://ipiranganews.inf.br/wp-content/uploads/SUPERAPETITE-1-02-05-23-780x470.jpg', '2025-07-01');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` text DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `imagem`) VALUES
(2, 'Cappuccino', 7.50, 'Bebida italiana à base de café expresso, leite vaporizado e espuma de leite', 'cappuccino'),
(3, 'Café Coado do Dia', 7.00, 'O clássico café brasileiro, coado na hora para garantir o máximo de sabor e aroma.', 'cafe-coado-do-dia'),
(4, 'Macchiato', 9.00, 'Uma dose de café espresso \"manchada\" com uma pequena quantidade de espuma de leite vaporizado por cima.', 'macchiato'),
(5, 'Folhado de Frango', 12.00, 'Folhado de Frango cremoso', 'folhado-frango'),
(6, 'Croissant de Queijo e Peito de Peru', 12.00, 'Croissant folhado, recheado com queijo derretido e peito de peru', 'croissant_queijo_peito_de_peru'),
(14, 'Way Coffee: Essência Dupla', 8.99, 'Um café duplo espresso cuidadosamente preparado com grãos especiais da Way Coffee.', 'cafe-expresso');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(20, 'usuario', 'usuario@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$aUtuYmQzdE1uaTcySlRVUQ$Xg2TsTHyx9hIaiW8RIlGnOQAEP9WCKF4YHEyyNvOYqs'),
(24, 'Admin', 'admin@waycoffee.com', '$argon2id$v=19$m=65536,t=4,p=1$L0NSdnZ6Qi9JZjB6alltcA$MUtEaJPm7zHGBOeyzBZZ6zmSwMRkAFSxJ6uPoaBLMhQ'),
(29, 'Camile', 'camile@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$N2ZxNWdPTXVwSTM4c0M5NA$rqXPgYyNvqQkvquQ07IjWquzNya55vU2J1h2q6Dnd6M'),
(31, 'Katy', 'katy@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$bnRnUXVTS3dKUDR1eFRIaA$yoMB18ySzDTm2m4HC+6artWJHbIThZk9224/g1rxDnQ');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `novidades`
--
ALTER TABLE `novidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `novidades`
--
ALTER TABLE `novidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
