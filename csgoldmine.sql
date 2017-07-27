-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Mer 21 Septembre 2016 à 00:31
-- Version du serveur :  5.5.49-0+deb8u1
-- Version de PHP :  5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `csgoldmine`
--

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `imgurl` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `config`
--

INSERT INTO `config` (`id`, `title`, `imgurl`, `link`) VALUES
(1, 'NetsCraft - Run-Ranked PVP-FACTIONS', 'http://cdn.mos.cms.futurecdn.net/0251a68aac5cbe5430e3de628cd2d08e-650-80.jpg', 'http://cdn.mos.cms.futurecdn.net/0251a68aac5cbe5430e3de628cd2d08e-650-80.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `feeds`
--

CREATE TABLE `feeds` (
  `id` int(11) NOT NULL,
  `steamid` text NOT NULL,
  `pts` varchar(255) NOT NULL,
  `wall` varchar(255) NOT NULL DEFAULT 'OfferToro'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `feeds`
--

INSERT INTO `feeds` (`id`, `steamid`, `pts`, `wall`) VALUES
(1, '76561198161184906', '100', 'OfferToro'),
(2, '76561198161184906', '60', 'OfferToro'),
(3, '76561198161184906', '50', 'AdscendMedia'),
(4, '76561198161184906', '1000.00', 'AdGate');

-- --------------------------------------------------------

--
-- Structure de la table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `store`
--

INSERT INTO `store` (`id`, `title`, `image`, `price`) VALUES
(13, 'd', 'https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXX7gNTPcUxuxpJSXPbQv2S1MDeXkh6LBBOie3rKFRh16PKd2pDvozixtSOwaP2ar7SlzIA6sEo2rHCpdyhjAGxr0A6MHezetG0RZXdTA/256fx256f', 10);

-- --------------------------------------------------------

--
-- Structure de la table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `steamid` varchar(255) NOT NULL,
  `message` text,
  `date_creation` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `support`
--

INSERT INTO `support` (`id`, `active`, `steamid`, `message`, `date_creation`) VALUES
(1, 0, '76561198255786103', 'TEST MSG', NULL),
(3, 0, '76561198161184906', 'ZSDS', '2016-09-06 22:43:24'),
(4, 0, '76561198161184906', 'PENIS EYES', '2016-09-06 22:43:43'),
(5, 0, '76561198161184906', 'SSD', '2016-09-06 23:23:35'),
(6, 0, '76561198161184906', 's it possible to get user\'s steamID by his nickname? I didn\'t find solution in steam API documentation. The only one thing that I found is an old post on http://dev.dota2.com :\r\n\r\nYou can use this to search the Dota2 API directly using the player_name option of GetMatchHistory You can then find their 32-bit ID in the list and then convert it to a 64-bit ID.\r\nBut now GetMatchHistory function does not have player_name parameter. Now it requires account_id.\r\n\r\nSo how the websites like http://dotabuff.com/search?q=Dendi get this info?', '2016-09-07 00:31:50'),
(7, 0, '76561198161184906', 'SDSDSQD', '2016-09-07 01:16:08'),
(8, 0, '76561198161184906', 'QSDQDQ', '2016-09-07 01:16:27'),
(9, 0, '76561198161184906', 'QSDSQDQ6595', '2016-09-07 01:16:38');

-- --------------------------------------------------------

--
-- Structure de la table `support_answers`
--

CREATE TABLE `support_answers` (
  `id` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `steamid` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_answer` datetime NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `support_answers`
--

INSERT INTO `support_answers` (`id`, `id_ticket`, `steamid`, `message`, `date_answer`, `rank`) VALUES
(1, 9, '<br /><b>Notice</b>:  Undefined index: id in <b>/var/www/csgoldmine/ticket.php</b> on line <b>151</b><br />', 'zdsqd', '2016-09-07 01:17:32', 1),
(2, 9, '<br /><b>Notice</b>:  Undefined index: id in <b>/var/www/csgoldmine/ticket.php</b> on line <b>151</b><br />', 'DISIZE', '2016-09-07 01:17:41', 1),
(3, 5, '76561198161184906', 'sdfsdfsd', '2016-09-07 11:31:13', 1),
(4, 3, '76561198161184906', 'qsdqsdq', '2016-09-07 11:31:42', 1),
(5, 9, '76561198161184906', 'REPOINSEE\r\n', '2016-09-07 11:34:26', 1);

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `steam_id` varchar(255) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `balance_before` int(11) NOT NULL,
  `balance_after` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `item_recieved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `transactions`
--

INSERT INTO `transactions` (`id`, `steam_id`, `item_title`, `item_id`, `date`, `balance_before`, `balance_after`, `price`, `ip`, `item_recieved`) VALUES
(2, '76561198255786103', 'CHROMA 2 CASES KEY\r\n', 1, '2016-08-31 03:47:16', 9991600, 9990400, 1200, '::1', 1),
(3, '76561198255786103', 'CHROMA 2 CASES KEY\r\n', 1, '2016-08-31 12:33:44', 9990400, 9989200, 1200, '::1', 1),
(4, 'd', 'd', 1, '2016-09-01 03:34:42', 1, 1, 1, '1', 1),
(5, 'd', 'd', 1, '2016-09-01 03:34:51', 1, 1, 1, '1', 1),
(6, '76561198255786103', 'CHROMA 2 CASES KEY\r\n', 1, '2016-09-01 12:37:44', 9989200, 9988000, 1200, '70.82.120.119', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(16) NOT NULL,
  `steam_id` text NOT NULL,
  `username` text NOT NULL,
  `avatar_little` text NOT NULL,
  `avatar_medium` text NOT NULL,
  `steam_profile` text NOT NULL,
  `last_connexion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `refid` text,
  `steam_status` int(1) NOT NULL,
  `points` float NOT NULL,
  `trade_url` text NOT NULL,
  `email` text NOT NULL,
  `status` int(1) NOT NULL,
  `ip` text NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `steam_id`, `username`, `avatar_little`, `avatar_medium`, `steam_profile`, `last_connexion`, `refid`, `steam_status`, `points`, `trade_url`, `email`, `status`, `ip`, `rank`) VALUES
(1, '76561198255786103', 'Falcon', 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/f4/f445e591a61143704112fc035c621faaa8cae1c4.jpg', 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/f4/f445e591a61143704112fc035c621faaa8cae1c4_medium.jpg', 'http://steamcommunity.com/id/Vjava/', '2016-09-20 22:27:46', NULL, 0, 9988010, 'https://steamcommunity.com/tradeoffer/new/?partner=295520375&amp;token=wVBl8OZy', 'yanimeziani25@gmail.com', 0, '24.53.16.70', 1),
(2, '76561198328511147', 'meziyani', 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb.jpg', 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_medium.jpg', 'http://steamcommunity.com/profiles/76561198328511147/', '2016-09-02 03:06:21', NULL, 0, 0, '&lt;strong&gt;steamcommunity.com&lt;/strong&gt;', '', 0, '70.82.120.119', 0),
(4, '76561198161184906', 'Skin0xYT', 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/08/08aab73ce3b7e9fdef69319a0ca57700d4c4785a.jpg', 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/08/08aab73ce3b7e9fdef69319a0ca57700d4c4785a_medium.jpg', 'http://steamcommunity.com/id/SkinOx20/', '2016-09-19 21:51:57', '0', 1, 2195, 'https://steamcommunity.com/tradeoffer/new/?partner=200919178&amp;token=wnO7udDA', 'rivals2010@hotmail.fr', 0, '93.28.93.172', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `support_answers`
--
ALTER TABLE `support_answers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `feeds`
--
ALTER TABLE `feeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `support_answers`
--
ALTER TABLE `support_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
