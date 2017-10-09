-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 04 Mai 2016 à 16:15
-- Version du serveur :  5.6.25
-- Version de PHP :  5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_cuisine`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `author` text NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `rating` int(2) NOT NULL,
  `creation_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ingredients` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `author`, `title`, `content`, `rating`, `creation_date`, `status`, `ingredients`) VALUES
(1, 'Lorem', 'Ipsum dolor sit amet, consectetur adipiscing elit.', 'In consectetur congue turpis, et sollicitudin turpis hendrerit a. Fusce a dignissim felis. Fusce tincidunt et eros id scelerisque. Donec pellentesque magna eget sodales vehicula. Sed id felis aliquet, sollicitudin nisl et, fringilla ipsum. Mauris at maximus magna. Donec ultrices condimentum ante, quis fringilla elit pulvinar a. Aenean eu placerat nunc, in sagittis nulla. Aliquam egestas scelerisque turpis, id mollis libero vestibulum et. Sed eget magna ac eros mollis tempor. Quisque fringilla massa ex, venenatis gravida tortor lacinia sit amet. Vivamus at arcu mollis, fermentum eros sit amet, ornare nibh. Pellentesque vestibulum massa vitae sapien convallis egestas in quis elit. Quisque eget dolor lobortis, porttitor dui a, pulvinar ex. Vestibulum laoreet condimentum suscipit.', 5, '2015-04-06 00:15:06', 1, ''),
(2, 'Class', 'Aptent taciti sociosqu ad litora torquent per conu', 'Integer et quam et dui consequat lacinia. Phasellus eleifend erat vitae sem varius, vitae blandit massa iaculis. Quisque euismod tincidunt maximus. Quisque vel nisi rhoncus, volutpat justo nec, aliquam ante. Proin sit amet gravida est. Donec lobortis maximus sem, non dapibus nulla scelerisque eu. Nam ac vestibulum magna. Integer tempor, arcu eu gravida mollis, elit dolor laoreet est, sed dictum ex orci sit amet nisl. Nulla vestibulum aliquet nisi et mollis. Sed sodales purus purus, aliquam luctus sem eleifend in. Suspendisse tortor massa, eleifend facilisis ultricies at, fringilla et lectus. Integer venenatis suscipit velit, non vestibulum lacus imperdiet a. Nunc nulla mi, sagittis ac augue sed, mattis pharetra neque. Integer a consequat est, nec efficitur lacus. Nam interdum tincidunt elit sed varius.', 2, '2014-11-17 07:13:11', 1, ''),
(3, 'Donec', 'Tristique velit id dapibus auctor. Nam ', 'Nam nec porta turpis. Ut sed felis sem. Sed elementum in erat ultrices interdum. Sed aliquet lectus sit amet molestie blandit. Vivamus efficitur nibh non risus euismod convallis. Aliquam feugiat, purus nec sollicitudin iaculis, nisl odio porta ex, vitae sodales nisl augue tincidunt mauris. Etiam eleifend at lorem vitae sollicitudin. Fusce gravida tortor id metus sodales, id interdum turpis lobortis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam ac fermentum ex. Mauris quis ex et augue pellentesque tristique id at odio. Phasellus nunc eros, molestie nec purus at, auctor cursus metus. Pellentesque eu venenatis tortor.', 3, '2014-05-09 04:27:04', 1, ''),
(4, 'Mauris', 'Sapien nunc, pharetra non purus non, mollis tincid', 'Nullam id lacus id arcu feugiat fringilla a in dolor. Phasellus accumsan odio tincidunt pharetra pretium. Duis quis pellentesque mauris, vitae feugiat arcu. Vivamus euismod tellus fermentum, ornare tortor nec, blandit arcu. Praesent ut pulvinar sapien. Nam sit amet risus sit amet tellus volutpat porta sit amet quis nisl. Aenean auctor nisi sit amet orci efficitur euismod. Nulla tincidunt, enim et ultrices finibus, velit dui elementum odio, in convallis quam ante vitae sapien.', 1, '2015-07-04 11:43:31', 1, ''),
(5, 'Maecenas', 'Neque neque, laoreet a rutrum ullamcorper, suscipi', 'Praesent congue, lorem in congue dictum, justo lorem consectetur erat, in placerat lorem arcu vitae turpis. In eget gravida risus. Mauris eleifend sem at nisi posuere consectetur. Morbi eu nisi tempus, pellentesque erat vel, dapibus tellus. Curabitur rhoncus orci sit amet libero vehicula, ac pretium mauris placerat. Duis quam nisi, pharetra nec luctus id, porta egestas eros. Vestibulum eu ex lacus. Donec porttitor viverra arcu, sed tempus justo facilisis a. Maecenas dictum est vitae nulla volutpat scelerisque. Nulla non quam aliquam, eleifend nisi eget, pellentesque velit. Ut ac suscipit elit. Sed cursus, ipsum et euismod pretium, nisl lorem euismod neque, non congue massa quam eget dolor.', 0, '2014-03-22 20:45:16', 1, ''),
(6, 'In', 'Non odio sit amet metus viverra scelerisque. E', 'Etiam eu felis malesuada, mollis ligula eget, fermentum sem. Curabitur dictum dictum rhoncus. In scelerisque efficitur nisi, nec tincidunt risus ornare ac. Curabitur vel rutrum neque. Mauris eleifend porta magna ultricies fringilla. Donec ut mauris sit amet enim condimentum facilisis nec non diam. Suspendisse vel metus feugiat elit sodales convallis vitae eu ligula. Sed ut augue sit amet augue cursus pretium.', 5, '2014-01-01 02:19:04', 1, ''),
(7, 'Nulla', 'Rhoncus, odio sed vulputate volutpat, metus erat t', 'Donec ut felis a dui consectetur molestie. In ac vestibulum lacus. Ut in dictum mauris. Suspendisse blandit id sem consequat suscipit. Nulla interdum pretium porta. Etiam mollis turpis neque, ac ultrices neque vulputate nec. Maecenas tincidunt ligula non orci suscipit pretium. Phasellus commodo porta lacus a faucibus. Praesent vitae erat sit amet orci fermentum dignissim at at nunc. Sed convallis sed diam in pretium. Mauris sollicitudin convallis lacus non ullamcorper. Proin pharetra nec turpis vitae commodo. Integer accumsan sit amet lorem a iaculis.', 3, '2014-09-17 23:09:41', 1, ''),
(8, 'Quisque', 'Suscipit ex sit amet lacus euismod dictum. Nullam', 'Nullam a posuere turpis, in scelerisque felis. Praesent sit amet ex tempus, pharetra ligula at, maximus massa. Ut id nisl lectus. Phasellus dictum enim sit amet eros sodales, quis molestie ipsum iaculis. Fusce id lacus id quam congue pharetra fermentum at ante. Praesent rhoncus, nibh quis imperdiet convallis, quam enim efficitur augue, et vehicula mi mauris sit amet libero. Aenean scelerisque, elit et condimentum porttitor, nunc lectus scelerisque augue, eu volutpat magna purus id enim. Suspendisse rhoncus nisl quis lacus mattis eleifend. Nulla vel vehicula purus. Maecenas ultrices diam et risus ornare ullamcorper. Vivamus vel metus purus. Ut convallis felis ac gravida elementum. Curabitur cursus mauris a arcu suscipit, non sollicitudin est malesuada. Etiam porta pharetra diam, eu auctor urna ornare id.', 2, '2015-02-07 04:00:51', 1, ''),
(9, 'Pellentesque', 'Sodales lacus vitae lectus eleifend rutrum. Fusce ', 'Fusce a orci eu dui fermentum vulputate. Aenean tempor venenatis vestibulum. Cras imperdiet placerat lacus at pretium. Integer vel purus hendrerit lorem aliquet ornare at at felis. Quisque risus dolor, fringilla ut eros in, rutrum semper leo. Pellentesque viverra felis arcu, congue euismod nulla placerat eu. Phasellus quis venenatis neque. Praesent ut lacus non mauris fermentum mattis eget eget nunc. Nulla mattis ac nibh sed semper. Nulla et felis ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc et aliquam nunc. Nullam pretium semper elit in dictum. Sed vel risus a libero venenatis elementum in sed purus. Nulla euismod pellentesque diam, eget eleifend metus tincidunt in.', 4, '2015-01-21 13:38:19', 1, ''),
(10, 'Mauris', 'Non nulla euismod, finibus nulla vel, interdum ris', 'Pellentesque sagittis velit turpis, a malesuada purus vestibulum dictum. Duis eleifend purus in cursus cursus. Sed et purus eget elit hendrerit viverra. Phasellus sit amet maximus metus. Cras auctor tincidunt erat, sed facilisis orci mattis molestie. Curabitur ac pretium elit. Pellentesque porta orci vitae molestie dictum. Phasellus finibus risus in ante facilisis, vitae feugiat lacus consectetur. Sed sit amet lectus posuere, sagittis orci eget, placerat nisi. Sed ac diam aliquam, hendrerit dolor sed, tempus felis. Maecenas ullamcorper a arcu ut pulvinar. Curabitur ultricies odio odio, vel consequat leo viverra ac.', 4, '2015-01-23 18:48:50', 1, ''),
(11, 'Praesent', 'Id mi interdum, finibus lorem rutrum, ornare arcu.', 'Nunc sagittis et nunc vitae finibus. Nam vitae felis sed nisi posuere finibus eget eu est. Mauris condimentum pellentesque tempor. Proin tempus turpis non leo vehicula mollis. Etiam at mollis ligula. Sed molestie diam sed ante gravida vehicula. Quisque eleifend urna non leo molestie, vitae feugiat sem ullamcorper. In hac habitasse platea dictumst. Cras consectetur dictum diam, vel scelerisque ligula tempor eget. Nunc lacus risus, convallis id leo blandit, lobortis tristique neque. Nullam luctus iaculis neque. Curabitur tincidunt ante quis purus rhoncus euismod. Duis vel tellus enim. Etiam cursus, leo eu vulputate varius, ex neque facilisis augue, ut vestibulum felis ligula sollicitudin massa.', 4, '2015-12-07 14:13:10', 1, ''),
(12, 'Suspendisse', 'Potenti. Morbi laor', 'Morbi laoreet urna ipsum, eu auctor massa pellentesque non. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum at neque ac lacus ornare porttitor. Nam ultricies dolor mi. Praesent pellentesque egestas nibh consequat hendrerit. Aliquam ultricies purus eu enim maximus, sed accumsan lacus malesuada. In a ligula pellentesque, ultrices velit sed, facilisis est. Suspendisse augue neque, ullamcorper et tristique et, luctus eu sem. Nulla fermentum nisl diam, id vulputate mauris luctus ut. Aliquam quis posuere dolor, vel mattis ipsum.', 5, '2014-08-21 19:40:03', 1, ''),
(13, 'Phasellus', 'Vulputate porttitor urna, nec ultrices justo posue', 'Morbi velit massa, pretium at urna a, laoreet pharetra metus. Etiam a dapibus nunc, eu convallis eros. Etiam bibendum vulputate rutrum. In accumsan tellus lectus, sed elementum urna laoreet ut. Nunc luctus lectus turpis, nec vestibulum neque sollicitudin at. Nunc semper erat id elit interdum luctus vitae quis orci. Fusce congue elementum augue, eleifend semper felis dapibus id. Donec quis lorem mi. Nam euismod porta magna, eget suscipit ante. Integer pharetra fringilla mauris, et tempor dui vestibulum vel. Sed quis ipsum id diam vulputate euismod id vel tortor. Praesent feugiat dui porttitor ipsum porttitor, vel lobortis risus posuere.', 3, '2014-09-02 03:54:14', 1, ''),
(14, 'Nam', 'Quam sem, eleifend sed viverra nec, tempor ut veli', 'Ut eu fermentum ex. Nam porta id purus eu tempor. Maecenas scelerisque feugiat nisl, id ultricies erat tempor nec. Duis pharetra augue eu purus gravida, et aliquet justo euismod. Curabitur vulputate urna et augue vestibulum pretium. Sed in felis sed enim sodales aliquam ut molestie elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 5, '2014-12-28 07:39:29', 1, ''),
(15, 'Mauris', 'Maximus dictum ultrices. Integ', 'Integer pretium commodo nisl, at tristique lacus tincidunt vel. Quisque et augue tortor. Aliquam sed sagittis erat. Aenean nec dui mi. Integer tempus commodo augue ut egestas. Duis porttitor enim eget malesuada tempor. Proin sollicitudin ante mattis libero scelerisque, nec lobortis eros semper.', 1, '2014-02-08 03:40:31', 1, ''),
(16, 'Nulla', 'Accumsan neque eget nisl viverra dapibus. Vest', 'Vestibulum tempor dapibus magna, vel ullamcorper sem faucibus vitae. Nunc convallis finibus nisl, a ullamcorper justo pretium eu. Vestibulum ut est id nunc dictum faucibus sit amet ut nibh. Nunc pretium cursus eleifend. Aenean efficitur sapien eu lacus pellentesque laoreet. Etiam vel dolor ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas aliquam, tellus et facilisis porttitor, urna ligula scelerisque nunc, eget porta ligula enim sed nisl. Nulla tempor lobortis lectus.', 5, '2016-05-17 07:43:08', 1, ''),
(17, 'Suspendisse', 'Potenti. Praesent r', 'Praesent rhoncus fermentum quam sed vulputate. Mauris id massa ut turpis placerat vulputate. In eget ipsum in dui finibus ultrices. Praesent gravida imperdiet purus. Sed rutrum, justo in egestas scelerisque, arcu nunc euismod odio, a ultrices justo lorem et ex. Pellentesque accumsan venenatis ex nec semper. Sed sed mattis risus. Curabitur sit amet elit eros. Nam ac leo turpis. Nam porttitor volutpat metus, quis rhoncus tortor congue nec. Donec id mollis risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 4, '2014-04-22 14:32:02', 1, ''),
(18, 'Aliquam', 'Vulputate et elit et ornare. Mauris', 'Mauris posuere neque est, sed viverra est congue nec. Phasellus sit amet viverra quam. Curabitur feugiat viverra mauris. Mauris dapibus magna eu libero mollis tempus. Vestibulum ac augue ac ante pulvinar sagittis nec nec metus. Ut massa felis, viverra vel cursus et, gravida nec tellus. Nulla egestas ante quis lacinia sodales. Vivamus id mattis nunc. Sed vestibulum risus vel sagittis suscipit. Aliquam erat volutpat.', 3, '2014-09-16 18:53:00', 1, ''),
(19, 'Sed', 'Elementum, dui condimentum faucibus rhoncus, nibh ', 'Nam tincidunt sapien nisi, et faucibus ante feugiat sed. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam gravida, nisl id interdum feugiat, libero nibh varius libero, sed fermentum libero diam ac velit. Duis eu ultrices dolor. Nam sed diam orci. Nunc vitae dolor in urna maximus molestie et vel orci. Nulla ullamcorper velit quis hendrerit porta. Etiam venenatis non justo eu imperdiet. Etiam facilisis tellus ac justo rutrum pharetra. In eros enim, egestas facilisis nunc vitae, cursus tincidunt ligula.', 0, '2015-02-19 12:30:45', 1, ''),
(20, 'Aenean', 'Vulputate felis eget nunc porttitor, a posuere ero', 'Morbi porttitor, nunc id pharetra vehicula, nisi mauris gravida elit, sit amet mollis neque lectus in sapien. Pellentesque ut accumsan dui. Vivamus ut lorem finibus, vehicula sem sit amet, aliquam neque. Aliquam faucibus massa laoreet augue semper commodo. Maecenas sed est quis neque consequat fringilla et porta justo. Pellentesque varius felis vel neque pretium, quis condimentum magna aliquam. Vivamus accumsan est at tristique pharetra. Sed laoreet enim vitae neque imperdiet rhoncus. Nunc cursus tortor quam, sit amet tristique augue ultrices nec. Morbi nunc quam, consequat et dolor at, cursus semper turpis. Nulla sed scelerisque leo. Morbi eget tincidunt odio. Curabitur at eros vel sem bibendum hendrerit non quis libero.', 1, '2014-03-24 16:08:05', 1, ''),
(21, 'Jemal', 'Hello ', 'merci pour votre aide.', 0, '2016-05-04 10:17:37', 0, ''),
(22, 'gioyuçpy_u', 'ghryttttttttttttttttttttttttttt', 'ttttttttttttttttttttttttttttttttryururf', 0, '2016-05-04 12:25:54', 0, 'upyoipmyopèçà^è_çr_èç'),
(23, 'jiloufggggggggftytytytytytytytytytytytyhj', 'gfjjjjjjjjjjjjh', 'ggggggggggggggdddddddddd', 0, '2016-05-04 12:27:38', 0, 'vghhhhhhhhhhhtggggggggggggggggggggfyghhtht'),
(24, 'jjejejejejejejjejeje', 'fsvbgfbffffbfbf', 'fjemalfjemalfjemalfjemalfjemalfjemalfjemalfjemalfjemalfjemalfjemalfjemal', 0, '2016-05-04 12:30:23', 0, 'fjemalfjemalfjemalfjemalfjemalfjemalfjemalfjemalfjemal'),
(25, 'fsgbfgfgkjfjhofjhofjhofjedmgjhodgjhmjdgjhdgj', 'fsgbfgfgkjfjhofjhofjhofjedmgjhodgjhmjdgjhdgj', 'fsgbfgfgkjfjhofjhofjhofjedmgjhodgjhmjdgjhdgjfsgbfgfgkjfjhofjhofjhofjedmgjhodgjhmjdgjhdgjfsgbfgfgkjfjhofjhofjhofjedmgjhodgjhmjdgjhdgjfsgbfgfgkjfjhofjhofjhofjedmgjhodgjhmjdgjhdgj', 0, '2016-05-04 14:17:08', 0, 'fsgbfgfgkjfjhofjhofjhofjedmgjhodgjhmjdgjhdgjfsgbfgfgkjfjhofjhofjhofjedmgjhodgjhmjdgjhdgjfsgbfgfgkjfjhofjhofjhofjedmgjhodgjhmjdgjhdgj');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
