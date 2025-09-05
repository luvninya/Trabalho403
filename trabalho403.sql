-- isso tem que ser inserido manualmente no mariadb

CREATE TABLE `lojas` (
  `id_loja` int(11) NOT NULL,
  `nome_loja` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `lojas` (`id_loja`, `nome_loja`) VALUES
(1, 'mondelez');

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(40) NOT NULL,
  `preco` float NOT NULL,
  `estoque` int(11) DEFAULT NULL,
  `id_loja` int(11) DEFAULT NULL,
  `preco_anterior` float DEFAULT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `lojas`
  ADD PRIMARY KEY (`id_loja`);

ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_loja` (`id_loja`);

ALTER TABLE `lojas`
  MODIFY `id_loja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_loja`) REFERENCES `lojas` (`id_loja`);
COMMIT;

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `preco`, `estoque`, `id_loja`, `preco_anterior`, `imagem`) 
  VALUES (1, 'Club Social Original', 2, NULL, 1, 3.5, 'club_social.webp');

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `preco`, `estoque`, `id_loja`, `preco_anterior`, `imagem`) 
  VALUES (2, 'Club Social Pizza', 6, NULL, 1, 7.5, 'club_social_pizza.jpg');

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `preco`, `estoque`, `id_loja`, `preco_anterior`, `imagem`) 
  VALUES (3, 'Club Social Pão de Alho', 6, NULL, 1, 7.5, 'club_social_pao_alho.webp');

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `preco`, `estoque`, `id_loja`, `preco_anterior`, `imagem`) 
  VALUES (4, 'Club Social Cebola Caramelizada', 6, NULL, 1, 7.5, 'club_social_cebola_caramelizada.webp');

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `preco`, `estoque`, `id_loja`, `preco_anterior`, `imagem`) 
  VALUES (4, 'Club Social Presunto', 5.8, NULL, 1, 7, 'club_social_presunto.webp');