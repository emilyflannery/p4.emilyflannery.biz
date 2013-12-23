-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2013 at 07:29 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `emilyfla_p4_emilyflannery_biz`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredient_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`ingredient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredient_id`, `title`) VALUES
(1, 'salt'),
(2, 'flour'),
(3, 'water'),
(4, 'yeast'),
(5, 'egg yolk'),
(6, 'olive oil'),
(7, 'gruyere, grated'),
(8, 'leeks'),
(9, 'eggs'),
(10, 'half-and-half'),
(11, 'country bread, cut into 1-inch pieces (about 5 cups)'),
(12, 'chives'),
(13, 'crimini mushrooms'),
(14, 'gound beef'),
(15, 'dried spaghetti'),
(16, 'onion'),
(17, 'carrots'),
(18, 'garlic'),
(19, 'ground pork'),
(20, 'tomato paste'),
(21, 'dry white wine'),
(22, 'crushed tomatoes'),
(23, 'milk'),
(24, 'fresh Parmesan cheese'),
(25, 'white sugar');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `description`) VALUES
(1, 'Mushroom & Gruyere Bread Pudding', 'Heat oven to 350° F. Heat the oil in a large skillet over medium heat. Add the leeks and cook, stirring frequently, until beginning to soften, 3 to 4 minutes. Add the mushrooms, ½ teaspoon salt, and ¼ teaspoon pepper and cook, tossing frequently, until the mushrooms are tender, 3 to 4 minutes more. Transfer to a bowl and let cool slightly.\r\nWhisk together the eggs, half-and-half, and ¼ teaspoon each salt and pepper in a large bowl. Add the bread, Gruyère, and mushroom mixture and mix to combine.\r\nTransfer to an 8-inch or other 2-quart baking dish and cover with foil. Bake until the edges are set but the center is slightly wobbly, 20 to 30 minutes. Uncover and bake until browned, 20 to 25 minutes more. Sprinkle with the chives.'),
(2, 'Spaghetti Bolognese', 'Get yourself a large heavy-bottomed saucepan, and place it on a medium heat. Add a good lug of olive oil and gently fry your bacon until golden and crisp, then reduce the heat slightly and add your onions, carrots, celery and garlic. Next remove the leaves from the Rosemary sprigs and add them to the pot, discarding the sprigs. Move everything around and fry for around 8-10 minutes until the veg has softened.\r\nNext, increase the heat slightly, add the mince and stir until the meat is browned all over.\r\nStir in your tins of plum/chopped tomatoes, (plum tomatoes are best as they contain less water, but either will turn out great!). Add your remaining herbs, tomato puree, stock cube, chilli and if using, the wine. Slice your cherry tomatoes in half and throw them in aswell.\r\nGive everything a stir with a wooden spoon, breaking up the plum tomatoes as you go and bring to a gentle simmer. Reduce the heat to low-medium, put the lid on and leave it blipping away for about an hour and 15 minutes until the flavours develop into a wonderfully rich tomatoey sauce. Stir occasionally to make sure it doesn''t catch.\r\nJust as the sauce is nearly ready, Add the parmesan and season to taste. Meanwhile add salt to a pan of boiling water and cook the spaghetti according the the packet instructions. Once the spaghetti is ready, drain it in a colander and add it to the pan with the sauce. Give it all a good stir, coating the pasta in the lovely tomato sauce. Serve with a little grated parmesan and use the extra basil leaves to make a great little garnish. Beautiful!\r\n\r\nRecipe by BBC GoodFood'),
(3, 'French Baguette', 'Place 1 cup water, bread flour, sugar, salt and yeast into bread machine pan in the order recommended by manufacturer. Select Dough cycle, and press Start.\r\n\r\nWhen the cycle has completed, place dough in a greased bowl, turning to coat all sides. Cover, and let rise in a warm place for about 30 minutes, or until doubled in bulk. Dough is ready if indentation remains when touched.\r\n\r\nPunch down dough. On a lightly floured surface, roll into a 16x12 inch rectangle. Cut dough in half, creating two 8x12 inch rectangles. Roll up each half of dough tightly, beginning at 12 inch side, pounding out any air bubbles as you go. Roll gently back and forth to taper end. Place 3 inches apart on a greased cookie sheet. Make deep diagonal slashes across loaves every 2 inches, or make one lengthwise slash on each loaf. Cover, and let rise in a warm place for 30 to 40 minutes, or until doubled in bulk.\r\n\r\nPreheat oven to 375 degrees F (190 degrees C). Mix egg yolk with 1 tablespoon water; brush over tops of loaves.\r\n\r\nBake for 20 to 25 minutes in the preheated oven, or until golden brown.\r\n\r\nRecipe by All Recipes');

-- --------------------------------------------------------

--
-- Table structure for table `recipes_ingredients`
--

CREATE TABLE `recipes_ingredients` (
  `recipe_ingredient_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  PRIMARY KEY (`recipe_ingredient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `recipes_ingredients`
--

INSERT INTO `recipes_ingredients` (`recipe_ingredient_id`, `recipe_id`, `ingredient_id`, `title`, `quantity`, `unit`) VALUES
(1, 1, 1, 'salt', 1, 'tsp'),
(2, 2, 2, 'flour', 3, 'cup'),
(3, 2, 1, 'sugar', 1, 'cup'),
(4, 1, 8, 'leeks', 4, ''),
(5, 1, 13, 'crimini mushrooms, trimmed', 10, 'ounces'),
(6, 1, 9, 'large eggs', 3, ''),
(7, 1, 10, 'half-and-half', 2, 'cups'),
(8, 1, 11, 'country bread, cut into about 1-inch pieces', 5, 'cups'),
(9, 1, 7, 'Gruyere cheese, grated', 4, 'ounces'),
(10, 2, 6, 'olive oil', 1, 'Tablespoon'),
(11, 2, 16, 'onions, finely chopped', 2, ''),
(12, 2, 17, 'carrots, finely chopped', 3, ''),
(13, 2, 18, 'garlic', 6, 'cloves'),
(14, 2, 14, 'ground beef', 1, 'pound'),
(15, 2, 19, 'ground pork', 1, 'pound'),
(16, 2, 20, 'tomato paste', 0, 'cup'),
(17, 2, 1, 'course salt', 0, ''),
(18, 2, 21, 'dry white wine', 1, 'cup'),
(19, 2, 22, 'crushed tomatoes', 1, 'can (28 oz.)'),
(20, 2, 23, 'milk', 1, 'cup'),
(21, 2, 24, 'freshly grated Parmesan cheese', 0, 'as needed'),
(22, 3, 3, 'water', 1, 'cup'),
(23, 3, 2, 'flour', 2, 'cups'),
(24, 3, 25, 'white sugar', 1, 'Tablespoon'),
(25, 3, 1, 'salt', 1, 'teaspoon'),
(26, 3, 4, 'yeast', 1, 'teaspoon'),
(27, 3, 5, 'egg yolk', 1, ''),
(28, 3, 3, 'water', 1, 'tablespoon');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `token`, `password`, `first_name`, `last_name`, `email`, `avatar`) VALUES
(31, 'f2592ef6fe8d8dc88aa1e379fb83925e21484f70', '0c9cbca43e347f0d52b60d8a266a52c090359b92', 'Sarah', 'Flannery', 'emily@flannery.com', ''),
(35, '381074272cd5d82d9fdfcbcf32608d8afb7426f6', 'f1c045a45295a8e5d9a75874d03009f6023a7cd5', 'Robert', 'Glass', 'robert@glass.com', '35.png'),
(39, '6541f20f02add2346a1fac292899b77edea5db62', '2de725a72ebdacadff561062df48b3843dd4575f', '', '', '', '39'),
(40, 'd31bab5fdc9cb56b8b05b39756071d44135d9be1', '2de725a72ebdacadff561062df48b3843dd4575f', '', '', '', '40'),
(41, 'ae7d80d019cc7c2007c4557b3aab4999349ac335', '2de725a72ebdacadff561062df48b3843dd4575f', '', '', '', '41');

-- --------------------------------------------------------

--
-- Table structure for table `user_recipes`
--

CREATE TABLE `user_recipes` (
  `recipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`recipe_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `user_recipes`
--

INSERT INTO `user_recipes` (`recipe_id`, `user_id`) VALUES
(1, 31),
(2, 31),
(80, 35);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
