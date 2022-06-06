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
(4, 'Banaan', 'banaan.png', '0.50');

ALTER TABLE `nftshop_products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `nftshop_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;



/* Gebruikers tabel*/

CREATE TABLE `nftshop_users` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `nftshop_users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `nftshop_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;