-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jan-2026 às 21:51
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `brava-riserva`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm_acessos`
--

CREATE TABLE `adm_acessos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_acesso` datetime NOT NULL,
  `ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `adm_acessos`
--

INSERT INTO `adm_acessos` (`id`, `id_usuario`, `data_acesso`, `ip`) VALUES
(1, 1, '2024-05-10 09:11:10', '::1'),
(2, 1, '2024-05-13 09:05:46', '::1'),
(3, 1, '2024-05-13 15:19:36', '::1'),
(4, 1, '2024-05-15 15:16:01', '::1'),
(5, 1, '2024-05-21 13:41:33', '::1'),
(6, 1, '2024-10-18 11:11:44', '::1'),
(7, 1, '2024-10-22 16:37:40', '::1'),
(8, 1, '2024-10-23 18:00:20', '::1'),
(9, 1, '2024-10-23 18:17:06', '::1'),
(10, 1, '2024-10-24 09:09:40', '::1'),
(11, 1, '2024-10-25 15:09:58', '::1'),
(12, 1, '2024-10-29 14:28:08', '::1'),
(13, 1, '2024-10-30 14:15:13', '::1'),
(14, 1, '2024-11-01 09:23:47', '::1'),
(15, 1, '2024-11-05 14:31:10', '::1'),
(16, 1, '2024-11-25 16:37:26', '::1'),
(17, 1, '2025-02-18 09:00:37', '::1'),
(18, 1, '2025-02-19 18:20:56', '::1'),
(19, 1, '2025-02-20 16:29:21', '::1'),
(20, 1, '2025-02-21 15:29:25', '::1'),
(21, 1, '2025-02-25 11:46:50', '143.255.221.214'),
(22, 1, '2025-03-14 16:23:10', '201.131.139.162'),
(23, 1, '2025-07-08 11:52:21', '201.131.85.39'),
(24, 1, '2025-07-08 11:52:54', '201.131.85.39'),
(25, 1, '2025-07-08 14:15:08', '201.131.85.39'),
(26, 1, '2026-01-19 10:57:40', '::1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm_banners`
--

CREATE TABLE `adm_banners` (
  `id` int(3) UNSIGNED NOT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `subtitulo` varchar(60) DEFAULT NULL,
  `status` int(1) UNSIGNED NOT NULL DEFAULT 0,
  `link` varchar(255) DEFAULT NULL,
  `imagem` varchar(80) DEFAULT NULL,
  `imagem_mobile` varchar(60) DEFAULT NULL,
  `destino_cta` varchar(10) DEFAULT '_self',
  `texto_cta` varchar(50) DEFAULT NULL,
  `video` varchar(40) DEFAULT NULL,
  `ordem` varchar(3) DEFAULT NULL,
  `criado` datetime NOT NULL DEFAULT current_timestamp(),
  `atualizado` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `adm_banners`
--

INSERT INTO `adm_banners` (`id`, `titulo`, `subtitulo`, `status`, `link`, `imagem`, `imagem_mobile`, `destino_cta`, `texto_cta`, `video`, `ordem`, `criado`, `atualizado`) VALUES
(8, '<p>onde a vida flui</p>\r\n<p>com mais calma</p>', '', 1, 'https://api.whatsapp.com/send?phone=554799999999', 'banner-8-766.webp', 'banner-mobile-8-940.webp', '_blank', 'saiba mais', '', '001', '2022-10-04 15:10:46', '2026-01-16 17:34:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm_cadastro`
--

CREATE TABLE `adm_cadastro` (
  `id` int(3) UNSIGNED NOT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `p1` varchar(150) DEFAULT NULL,
  `p2` varchar(150) DEFAULT NULL,
  `criado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `adm_cadastro`
--

INSERT INTO `adm_cadastro` (`id`, `titulo`, `telefone`, `email`, `p1`, `p2`, `criado`) VALUES
(1, 'Marcos dos Santos Werner', '47 97878-7878', 'teste@teste.com', NULL, NULL, '2023-02-28 10:37:50'),
(55, 'Antonio Mafra', '47 97878-7878', 'testes@teses.com', NULL, NULL, '2023-12-14 15:29:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm_config`
--

CREATE TABLE `adm_config` (
  `id` int(1) NOT NULL,
  `nome_empresa` varchar(60) NOT NULL,
  `email_contato` varchar(200) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `celular2` varchar(20) DEFAULT NULL,
  `texto_whatsapp` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `behance` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `google_analytics` varchar(25) DEFAULT NULL,
  `smtp_host` varchar(50) NOT NULL,
  `smtp_user` varchar(50) NOT NULL,
  `smtp_pass` varchar(30) NOT NULL,
  `email_reply` varchar(50) NOT NULL,
  `smtp_port` varchar(5) NOT NULL,
  `incorporar_head` text DEFAULT NULL,
  `incorporar_body` text DEFAULT NULL,
  `instagram_token` varchar(255) DEFAULT NULL,
  `escavacao` varchar(4) DEFAULT NULL,
  `fundacao` varchar(4) DEFAULT NULL,
  `estrutura` varchar(4) DEFAULT NULL,
  `alvenaria` varchar(4) DEFAULT NULL,
  `acabamento_externo` varchar(4) DEFAULT NULL,
  `acabamento_interno` varchar(4) DEFAULT NULL,
  `total` varchar(4) NOT NULL,
  `atualizacao_obras` varchar(30) NOT NULL,
  `atualizado` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `adm_config`
--

INSERT INTO `adm_config` (`id`, `nome_empresa`, `email_contato`, `telefone`, `celular`, `celular2`, `texto_whatsapp`, `facebook`, `instagram`, `twitter`, `linkedin`, `behance`, `youtube`, `google_analytics`, `smtp_host`, `smtp_user`, `smtp_pass`, `email_reply`, `smtp_port`, `incorporar_head`, `incorporar_body`, `instagram_token`, `escavacao`, `fundacao`, `estrutura`, `alvenaria`, `acabamento_externo`, `acabamento_interno`, `total`, `atualizacao_obras`, `atualizado`) VALUES
(1, 'Brava Riserva', 'gustavo@quax.com.br', '.', '(47) 99999-9999', '', 'Olá! (Contato do site Plaza Beach)', '', '', '', '', '', '', '', 'mail.quax.com.br', 'envio@quax.com.br', 'U)E07oU)YfkS', 'contato@quax.com.br', '587', '', '', '', '100%', '78%', '50%', '57%', '64%', '73%', '4%', '30 AGOSTO 2024', '2026-01-16 16:38:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm_empreendimentos_imagens`
--

CREATE TABLE `adm_empreendimentos_imagens` (
  `id` int(11) NOT NULL,
  `id_galeria` int(11) NOT NULL DEFAULT 0,
  `arquivo` varchar(200) NOT NULL DEFAULT '',
  `legenda` varchar(200) NOT NULL DEFAULT '',
  `capa` int(1) NOT NULL DEFAULT 0,
  `ativo` int(1) NOT NULL DEFAULT 1,
  `ordem` varchar(3) NOT NULL DEFAULT '',
  `categoria` varchar(255) NOT NULL,
  `criado` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm_galeria`
--

CREATE TABLE `adm_galeria` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `permalink` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `criado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `adm_galeria`
--

INSERT INTO `adm_galeria` (`id`, `titulo`, `permalink`, `status`, `criado`) VALUES
(1, 'Plaza Beach - Apartamento', 'plaza-beach-apartamento', 1, '2020-10-19 18:45:22'),
(2, 'Brava Riserva - Lazer', 'plaza-beach-lazer', 1, '2024-10-30 17:18:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm_galeria_imagens`
--

CREATE TABLE `adm_galeria_imagens` (
  `id` int(11) NOT NULL,
  `id_galeria` int(11) NOT NULL DEFAULT 0,
  `arquivo` varchar(200) NOT NULL DEFAULT '',
  `legenda` varchar(200) NOT NULL DEFAULT '',
  `capa` int(1) NOT NULL DEFAULT 0,
  `ativo` int(1) NOT NULL DEFAULT 1,
  `ordem` varchar(3) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `criado` datetime DEFAULT current_timestamp(),
  `atualizado` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `adm_galeria_imagens`
--

INSERT INTO `adm_galeria_imagens` (`id`, `id_galeria`, `arquivo`, `legenda`, `capa`, `ativo`, `ordem`, `categoria`, `criado`, `atualizado`) VALUES
(127, 1, 'plaza-beach-apartamento-1-817.jpg', 'Living Tipo 01', 0, 1, '', 'galeria', '2025-03-14 16:53:14', '2025-03-14 16:56:52'),
(128, 1, 'plaza-beach-apartamento-1-497.jpg', 'Suíte Master Tipo 01', 0, 1, '', 'galeria', '2025-03-14 16:53:57', '2025-03-14 16:57:00'),
(129, 1, 'plaza-beach-apartamento-1-285.jpg', 'Living Tipo 02', 0, 1, '', 'galeria', '2025-03-14 16:54:24', '2025-03-14 16:57:11'),
(130, 1, 'plaza-beach-apartamento-1-133.jpg', 'Living Tipo 01', 0, 1, '', 'galeria', '2025-03-14 16:55:32', '2025-03-14 16:57:24'),
(131, 1, 'plaza-beach-apartamento-1-934.jpg', 'Suíte Master Tipo 02', 0, 1, '', 'galeria', '2025-03-14 16:56:10', '2025-03-14 16:57:33'),
(132, 1, 'plaza-beach-apartamento-1-308.jpg', 'Living Tipo 03', 0, 1, '', 'galeria', '2025-03-14 16:56:33', '2025-03-14 16:57:42'),
(133, 2, 'plaza-beach-lazer-2-158.jpg', 'Área de Lazer', 1, 1, '001', 'galeria', '2026-01-19 17:37:29', '2026-01-19 17:39:24'),
(134, 2, 'plaza-beach-lazer-2-940.jpg', 'Piscina Externa', 0, 1, '002', 'galeria', '2026-01-19 17:37:30', '2026-01-19 17:38:32'),
(135, 2, 'plaza-beach-lazer-2-92.jpg', 'Quiosque', 0, 1, '004', 'galeria', '2026-01-19 17:37:32', '2026-01-19 17:39:08'),
(136, 2, 'plaza-beach-lazer-2-832.jpg', 'Lago', 0, 1, '005', 'galeria', '2026-01-19 17:37:34', '2026-01-19 17:39:38'),
(137, 2, 'plaza-beach-lazer-2-433.jpg', 'Sala de Jogos', 0, 1, '003', 'galeria', '2026-01-19 17:37:34', '2026-01-19 17:38:50'),
(138, 2, 'plaza-beach-lazer-2-996.jpg', 'Academia', 0, 1, '007', 'galeria', '2026-01-19 17:37:35', '2026-01-19 17:40:19'),
(139, 2, 'plaza-beach-lazer-2-271.jpg', 'Pomar', 0, 1, '008', 'galeria', '2026-01-19 17:37:36', '2026-01-19 17:40:29'),
(140, 2, 'plaza-beach-lazer-2-52.jpg', 'Playground', 0, 1, '006', 'galeria', '2026-01-19 17:37:37', '2026-01-19 17:39:57'),
(141, 2, 'plaza-beach-lazer-2-512.jpg', 'Espaço Kids', 0, 1, '009', 'galeria', '2026-01-19 17:37:38', '2026-01-19 17:40:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm_paginas`
--

CREATE TABLE `adm_paginas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `permalink` varchar(100) NOT NULL,
  `arquivo` varchar(100) NOT NULL,
  `conteudo` longtext NOT NULL,
  `description` varchar(160) NOT NULL,
  `lang` varchar(2) NOT NULL DEFAULT 'pt',
  `autor` int(11) NOT NULL,
  `criado` datetime NOT NULL DEFAULT current_timestamp(),
  `atualizado` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `adm_paginas`
--

INSERT INTO `adm_paginas` (`id`, `titulo`, `permalink`, `arquivo`, `conteudo`, `description`, `lang`, `autor`, `criado`, `atualizado`) VALUES
(1, 'Home', 'index', 'index.php', '', 'O Plaza Beach é onde o horizonte do mar encontra o conforto absoluto.', 'pt', 1, '2014-08-08 20:49:46', '2025-02-25 11:48:04'),
(86, 'Política de Privacidade', 'politica-de-privacidade', 'politica-de-privacidade.php', '', '', 'pt', 1, '2021-03-04 09:39:00', '2023-03-07 14:55:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm_usuarios`
--

CREATE TABLE `adm_usuarios` (
  `id` int(11) NOT NULL,
  `nome_completo` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `acesso` varchar(100) NOT NULL,
  `categoria` varchar(20) NOT NULL DEFAULT 'cliente',
  `autor` int(11) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `adm_usuarios`
--

INSERT INTO `adm_usuarios` (`id`, `nome_completo`, `usuario`, `senha`, `email`, `acesso`, `categoria`, `autor`, `criado`, `atualizado`) VALUES
(1, 'Admin', 'burgo', '$2y$10$ZCVQDm2xefEnFdQU1qUifOXwaMUc2wrEtD4vlUKGqtkt7gW01QUba', 'quax@quax.com.br', '6-5-7-3-1-2', 'master', 0, '0000-00-00 00:00:00', '2025-07-08 11:52:40');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm_acessos`
--
ALTER TABLE `adm_acessos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_USER` (`id_usuario`);

--
-- Índices para tabela `adm_banners`
--
ALTER TABLE `adm_banners`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adm_cadastro`
--
ALTER TABLE `adm_cadastro`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Índices para tabela `adm_config`
--
ALTER TABLE `adm_config`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adm_empreendimentos_imagens`
--
ALTER TABLE `adm_empreendimentos_imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_EMP_IMG` (`id_galeria`);

--
-- Índices para tabela `adm_galeria`
--
ALTER TABLE `adm_galeria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adm_galeria_imagens`
--
ALTER TABLE `adm_galeria_imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_GALERIA` (`id_galeria`);

--
-- Índices para tabela `adm_paginas`
--
ALTER TABLE `adm_paginas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adm_usuarios`
--
ALTER TABLE `adm_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm_acessos`
--
ALTER TABLE `adm_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `adm_banners`
--
ALTER TABLE `adm_banners`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `adm_cadastro`
--
ALTER TABLE `adm_cadastro`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `adm_config`
--
ALTER TABLE `adm_config`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `adm_empreendimentos_imagens`
--
ALTER TABLE `adm_empreendimentos_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `adm_galeria`
--
ALTER TABLE `adm_galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `adm_galeria_imagens`
--
ALTER TABLE `adm_galeria_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT de tabela `adm_paginas`
--
ALTER TABLE `adm_paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de tabela `adm_usuarios`
--
ALTER TABLE `adm_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `adm_acessos`
--
ALTER TABLE `adm_acessos`
  ADD CONSTRAINT `FK_ID_USER` FOREIGN KEY (`id_usuario`) REFERENCES `adm_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
