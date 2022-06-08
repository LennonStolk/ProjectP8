CREATE DATABASE IF NOT EXISTS `nftshop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `nftshop`;



/* Producten tabel */

CREATE TABLE `nftshop_products` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `img_src` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `nftshop_products` (`id`, `name`, `img_src`, `price`) VALUES
(1, 'De gevreesde tomaat', 'tomaat.gif', '30.20'),
(2, 'Goomba', 'goomba.gif', '249.99'),
(3, 'Shrek', 'shrek.png', '10.00'),
(4, 'Banaan', 'banaan.png', '0.50'),
(5, 'Watermeloen', 'watermeloen.gif', '3999.99'),
(6, 'Diamant', 'diamant.gif', '0.50'),
(7, 'De gevreesde sinaasappel', 'sinaasappel.gif', '30.20'),
(8, 'Peer', 'peer.gif', '4.20'),
(9, 'Gele appel', 'appelgeel.png', '5.00'),
(10, 'Groene appel', 'appelgroen.png', '5.00'),
(11, 'Rode appel', 'appelrood.png', '5.00');

ALTER TABLE `nftshop_products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `nftshop_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;



/* Gebruikers tabel */

CREATE TABLE `nftshop_users` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `nftshop_users` (`id`, `name`, `password`, `role`) VALUES
(1, 'user', '$2y$10$bc9F7iKT8li8DNecwoLLz.ktAidJKL9NshSFZ1pDgon8bwXxkS/82', 'USER'),
(2, 'superuser', '$2y$10$KO4eqNyBaiS8TX.U2emBP.dkGHfzNQplrI6zRzH/isarggWD/Whem', 'SUPERUSER'),
(3, 'admin', '$2y$10$jlGwDF/KF.RwCjXCELu/b.M4kcKj0tu6UOwfj1SsSYfczT1pJnkLW', 'ADMIN');

ALTER TABLE `nftshop_users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `nftshop_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;



/* Aankondigingen tabel */

CREATE TABLE `nftshop_announcements` (
  `id` int(10) NOT NULL,
  `author` varchar(30) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `nftshop_announcements` (`id`, `author`, `content`, `date`) VALUES
(1, 'superuser', 'Hello world', 1654552708),
(2, 'superuser', 'Ik heet u van harte welkom bij nft-shop -Lennon', 1654552750);

ALTER TABLE `nftshop_announcements`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `nftshop_announcements`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;