SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Database: `db_sportshub`

-- Table structure for table `orders`


CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(15) NOT NULL auto_increment,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `units` int(5) NOT NULL,
  `total` int(15) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;


-- Table structure for table `products`

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL auto_increment,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `product_code` (`product_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


-- Dumping data for table `products`

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`) VALUES
(1, '1', 'Sports Shoes', 'soccer', 'shoes2.png', 10000, 5000.00),
(2, '2', 'Ball', 'soccer', 'soccer_ball1.png', 10000, 3400.00),
(3, '3', 'Sports Shoes', 'soccer', 'shoes.png', 10000, 6500.00),
(4, '4', 'Shin guard', 'soccer', 'shinguard1.png', 10000, 3800.00),
(5, '5', 'Sports Shoes', 'soccer', 'shoes2.png', 10000, 5000.00),
(6, '6', 'Sports Shoes', 'soccer', 'shoes.png', 10000, 6500.00),
(7, '7', 'Ball', 'soccer', 'socce_ball2.png', 10000, 6300.00),
(8, '8', 'Shin guard', 'soccer', 'shinguard1.png', 10000, 3800.00),
(9, '9', 'Shin guard', 'soccer', 'shinguard1.png', 10000, 3800.00),
(10, '10', 'Sports Shoes', 'soccer', 'shoes2.png', 10000, 5000.00),
(11, '11', 'Sports Shoes', 'soccer', 'shoes.png', 10000, 6500.00),
(12, '12', 'Ball', 'soccer', 'socce_ball2.png', 10000, 6300.00),
(13, '13', 'Shin guard', 'soccer', 'shinguard1.png', 10000, 3800.00),
(14, '14', 'Sports Shoes', 'soccer', 'shoes2.png', 10000, 5000.00),
(15, '15', 'Ball', 'soccer', 'soccer_ball1.png', 10000, 3400.00),
(16, '16', 'Sports Shoes', 'soccer', 'shoes.png', 10000, 6500.00),
(17, '17', 'Shin guard', 'soccer', 'shinguard1.png', 10000, 3800.00),
(18, '18', 'Sports Shoes', 'soccer', 'shoes2.png', 10000, 5000.00),
(19, '19', 'Sports Shoes', 'soccer', 'shoes2.png', 10000, 5000.00),
(20, '20', 'Sports Shoes', 'soccer', 'shoes.png', 10000, 6500.00),
(21, '21', 'Ball', 'soccer', 'socce_ball2.png', 10000, 6300.00),
(22, '22', 'Sports Shoes', 'soccer', 'shoes.png', 10000, 6500.00);




-- Table structure for table `users`


CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin` int(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL default 'user',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;


-- Dumping data for table `users`


INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `city`, `pin`, `email`, `password`, `type`) VALUES
(1, 'Steve', 'Jobs', 'Infinite Loop', 'California', 95014, 'sjobs@apple.com', 'steve', 'user');


CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL auto_increment,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin` int(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL default 'user',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;



INSERT INTO `admin` (`id`, `fname`, `lname`, `address`, `city`, `pin`, `email`, `password`, `type`) VALUES

(1, 'Admin', 'Webmaster', 'Internet', 'Electricity', 101010, 'admin@admin.com', 'admin', 'admin');