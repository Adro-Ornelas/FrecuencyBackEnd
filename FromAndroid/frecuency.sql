-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: frecuency
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album` (
  `ID_album` int(11) NOT NULL AUTO_INCREMENT,
  `ID_discografia` int(11) DEFAULT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Fecha` date NOT NULL,
  `Imagen` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_album`),
  KEY `ID_discografia` (`ID_discografia`),
  CONSTRAINT `album_ibfk_1` FOREIGN KEY (`ID_discografia`) REFERENCES `discografia` (`ID_discografia`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES (1,1,'Master Of Puppets','1986-03-03','res/albums/songs/master-of-puppets/master-of-puppets.jpg'),(2,2,'Bohemian Rhapsody: The Original Soundtrack','2018-10-19','res/albums/songs/bohemian-rhapsody/bohemian-rhapsody.jpg'),(3,3,'Nevermind','1991-09-26','res/albums/songs/nevermind.jpg'),(4,4,'Parachutes','2000-07-10','res/albums/songs/parachutes.jpg'),(5,5,'When We All Fall Asleep, Where Do We Go?','2019-03-29','res/albums/songs/when-we-all-fall-Asleep-where-do-we-go.jpg'),(6,6,'¿Dónde están los ladrones?','1998-09-29','res/albums/songs/donde-estan-los-ladrones.jpg'),(7,7,'Talento de barrio','2008-07-28','res/albums/songs/talento-de-barrio.jpg'),(8,8,'Views','2016-05-06','res/albums/songs/views.jpg'),(9,9,'21','2011-01-24','res/albums/songs/21-adele.jpg'),(10,10,'AM','2013-09-09','res/albums/songs/am.jpg'),(11,11,'Cementerio de Raperos','2017-11-16','res/albums/songs/cementerio-de-raperos/cementerio-de-raperos.jpg');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `album_artista`
--

DROP TABLE IF EXISTS `album_artista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album_artista` (
  `ID_album_artista` int(11) NOT NULL AUTO_INCREMENT,
  `ID_artista` int(11) DEFAULT NULL,
  `ID_album` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_album_artista`),
  KEY `ID_artista` (`ID_artista`),
  KEY `ID_album` (`ID_album`),
  CONSTRAINT `album_artista_ibfk_1` FOREIGN KEY (`ID_artista`) REFERENCES `artista` (`ID_artista`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `album_artista_ibfk_2` FOREIGN KEY (`ID_album`) REFERENCES `album` (`ID_album`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_artista`
--

LOCK TABLES `album_artista` WRITE;
/*!40000 ALTER TABLE `album_artista` DISABLE KEYS */;
INSERT INTO `album_artista` VALUES (1,1,1),(2,2,2),(3,3,3),(4,4,4),(5,5,5),(6,6,6),(7,7,7),(8,8,8),(9,9,9),(10,10,10),(11,11,11);
/*!40000 ALTER TABLE `album_artista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `albums2007_2017`
--

DROP TABLE IF EXISTS `albums2007_2017`;
/*!50001 DROP VIEW IF EXISTS `albums2007_2017`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `albums2007_2017` AS SELECT
 1 AS `nombre_artistico`,
  1 AS `album`,
  1 AS `fecha`,
  1 AS `discografia` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `artista`
--

DROP TABLE IF EXISTS `artista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artista` (
  `ID_artista` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_artistico` varchar(100) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido_Paterno` varchar(50) NOT NULL,
  `Apellido_Materno` varchar(50) NOT NULL,
  `num_tel` varchar(10) DEFAULT NULL,
  `fecha_show` date DEFAULT NULL,
  `ciudad_show` varchar(50) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  PRIMARY KEY (`ID_artista`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artista`
--

LOCK TABLES `artista` WRITE;
/*!40000 ALTER TABLE `artista` DISABLE KEYS */;
INSERT INTO `artista` VALUES (1,'Metallica','James Alan','Hetfield','Nicks','3312345678','2020-01-01','Guanajuato','18:00:00','20:00:00'),(2,'Queen','Farrokh','Bulsara','Dashti','3312345678','2020-01-01','New York','18:00:00','20:00:00'),(3,'Nirvana','Kurt Donald','Cobain','Fradenburg','3312345678','2020-01-01','New York','18:00:00','20:00:00'),(4,'Coldplay','Christopher Anthony','Martin','Buckland','3312345678','2020-01-01','New York','18:00:00','20:00:00'),(5,'Billie Eilish','Billie Eilish','O’Connell','Baird','3312345678','2020-01-01','New York','18:00:00','20:00:00'),(6,'Shakira','Shakira Isabel','Mebarak','Ripoll','3312345678','2020-01-01','New York','18:00:00','20:00:00'),(7,'Daddy Yankee','Ramón Luis','Ayala','Rodríguez','3312345678','2020-01-01','New York','18:00:00','20:00:00'),(8,'Drake','Aubrey Drake','Graham','Sher','3312345678','2020-01-01','New York','18:00:00','20:00:00'),(9,'Adele','Adele Laurie','Adkins','Blue','3312345678','2020-01-01','New York','18:00:00','20:00:00'),(10,'Arctic Monkeys','Alexander David','Turner','Thompson','3312345678','2020-01-01','New York','18:00:00','20:00:00'),(11,'Tren Lokote','Juan Fidel','Jurado','Velazquez','3322345678','1998-06-15','Seúl','20:05:00','23:06:00'),(12,'Michael Jackson','Michael Joseph','Jackson','Jackson','1234567890','1958-08-29','GDL','05:25:00','10:55:00'),(14,'Santa Grifa','Josue','Gonzalez','Manzano','3399887766','2025-06-30','Atenas','06:30:00','08:00:00');
/*!40000 ALTER TABLE `artista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cancion`
--

DROP TABLE IF EXISTS `cancion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cancion` (
  `ID_cancion` int(11) NOT NULL AUTO_INCREMENT,
  `ID_genero` int(11) DEFAULT NULL,
  `ID_album` int(11) DEFAULT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Letra` text NOT NULL,
  `Duracion` time NOT NULL,
  `Fecha` date NOT NULL,
  `Audio` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_cancion`),
  KEY `ID_album` (`ID_album`),
  KEY `ID_genero` (`ID_genero`),
  CONSTRAINT `cancion_ibfk_1` FOREIGN KEY (`ID_album`) REFERENCES `album` (`ID_album`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `cancion_ibfk_2` FOREIGN KEY (`ID_genero`) REFERENCES `genero` (`ID_genero`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cancion`
--

LOCK TABLES `cancion` WRITE;
/*!40000 ALTER TABLE `cancion` DISABLE KEYS */;
INSERT INTO `cancion` VALUES (1,2,1,'Battery','res/albums/songs/master-of-puppets/battery.txt','00:05:12','1986-03-03','res/albums/songs/master-of-puppets/battery.mp3'),(2,2,1,'Master Of Puppets','res/albums/songs/master-of-puppets/master-of-puppets.txt','00:08:35','1986-03-03','res/albums/songs/master-of-puppets/master-of-puppets.mp3'),(3,2,1,'The Thing That Should Not Be','res/albums/songs/master-of-puppets/the-thing-that-should-not-be.txt','00:06:36','1986-03-03','res/albums/songs/master-of-puppets/the-thing-that-should-not-be.mp3'),(4,2,1,'Welcome Home (Sanitarium)','res/albums/songs/master-of-puppets/welcome-home-sanitarium.txt','00:06:27','1986-03-03','res/albums/songs/master-of-puppets/welcome-home-sanitarium.mp3'),(5,2,1,'Disposable Heroes','res/albums/songs/master-of-puppets/disposable-heroes.txt','00:08:16','1986-03-03','res/albums/songs/master-of-puppets/disposable-heroes.mp3'),(6,2,1,'Leper Messiah','res/albums/songs/master-of-puppets/leper-messiah.txt','00:05:39','1986-03-03','res/albums/songs/master-of-puppets/leper-messiah.mp3'),(7,2,1,'Orion','res/albums/songs/master-of-puppets/orion.txt','00:08:27','1986-03-03','res/albums/songs/master-of-puppets/orion.mp3'),(8,2,1,'Damage, Inc.','res/albums/songs/master-of-puppets/damage-inc.txt','00:05:32','1986-03-03','res/albums/songs/master-of-puppets/damage-inc.mp3'),(9,1,2,'20th Century Fox Fanfare','res/albums/songs/bohemian-rhapsody/20th-century-fox-fanfare.txt','00:00:25','2018-10-19','res/albums/songs/bohemian-rhapsody/20th-century-fox-fanfare.mp3'),(10,1,2,'Somebody To Love','res/albums/songs/bohemian-rhapsody/somebody-to-love.txt','00:04:56','2018-10-19','res/albums/songs/bohemian-rhapsody/somebody-to-love.mp3'),(11,1,2,'Doing All Right... revisited','res/albums/songs/bohemian-rhapsody/doing-all-right-revisited.txt','00:03:16','2018-10-19','res/albums/songs/bohemian-rhapsody/doing-all-right-revisited.mp3'),(12,1,2,'Keep Yourself Alive (Live)','res/albums/songs/bohemian-rhapsody/keep-yourself-alive-live.txt','00:03:56','2018-10-19','res/albums/songs/bohemian-rhapsody/keep-yourself-alive-live.mp3'),(13,1,2,'Killer Queen','res/albums/songs/bohemian-rhapsody/killer-queen.txt','00:02:59','2018-10-19','res/albums/songs/bohemian-rhapsody/killer-queen.mp3'),(14,1,2,'Fat Bottomed Girls (Live)','res/albums/songs/bohemian-rhapsody/fat-bottomed-girls-live.txt','00:04:37','2018-10-19','res/albums/songs/bohemian-rhapsody/fat-bottomed-girls-live.mp3'),(15,1,2,'Bohemian Rhapsody','res/albums/songs/bohemian-rhapsody/bohemian-rhapsody.txt','00:05:55','2018-10-19','res/albums/songs/bohemian-rhapsody/bohemian-rhapsody.mp3'),(16,1,2,'Now I\'m Here (Live)','res/albums/songs/bohemian-rhapsody/now-im-here-live.txt','00:04:26','2018-10-19','res/albums/songs/bohemian-rhapsody/now-im-here-live.mp3'),(17,1,2,'Crazy Little Thing Called Love','res/albums/songs/bohemian-rhapsody/crazy-little-thing-called-love.txt','00:02:43','2018-10-19','res/albums/songs/bohemian-rhapsody/crazy-little-thing-called-love.mp3'),(18,1,2,'Love of My Life (Live)','res/albums/songs/bohemian-rhapsody/love-of-my-life-live.txt','00:04:29','2018-10-19','res/albums/songs/bohemian-rhapsody/love-of-my-life-live.mp3'),(19,1,2,'We Will Rock You (Movie Mix)','res/albums/songs/bohemian-rhapsody/we-will-rock-you-movie-mix.txt','00:02:09','2018-10-19','res/albums/songs/bohemian-rhapsody/we-will-rock-you-movie-mix.mp3'),(20,1,2,'Another One Bites The Dust	','res/albums/songs/bohemian-rhapsody/another-one-bites-the-dust.txt','00:03:35','2018-10-19','res/albums/songs/bohemian-rhapsody/another-one-bites-the-dust.mp3'),(21,1,2,'I Want To Break Free','res/albums/songs/bohemian-rhapsody/i-want-to-break-free.txt','00:03:43','2018-10-19','res/albums/songs/bohemian-rhapsody/i-want-to-break-free.mp3'),(22,1,2,'Under Pressure','res/albums/songs/bohemian-rhapsody/under-pressure.txt','00:03:55','2018-10-19','res/albums/songs/bohemian-rhapsody/under-pressure.mp3'),(23,1,2,'Who Wants To Live Forever','res/albums/songs/bohemian-rhapsody/who-wants-to-live-forever.txt','00:05:15','2018-10-19','res/albums/songs/bohemian-rhapsody/who-wants-to-live-forever.mp3'),(24,1,2,'Bohemian Rhapsody (Live Aid)','res/albums/songs/bohemian-rhapsody/bohemian-rhapsody-live-aid.txt','00:02:28','2018-10-19','res/albums/songs/bohemian-rhapsody/bohemian-rhapsody-live-aid.mp3'),(25,1,2,'Radio Ga Ga (Live Aid)','res/albums/songs/bohemian-rhapsody/radio-ga-ga-live-aid.txt','00:04:06','2018-10-19','res/albums/songs/bohemian-rhapsody/radio-ga-ga-live-aid.mp3'),(26,1,2,'Ay-Oh (Live Aid)','res/albums/songs/bohemian-rhapsody/ay-oh-live-aid.txt','00:00:41','2018-10-19','res/albums/songs/bohemian-rhapsody/ay-oh-live-aid.mp3'),(27,1,2,'Hammer To Fall (Live Aid)','res/albums/songs/bohemian-rhapsody/hammer-to-fall-live-aid.txt','00:04:03','2018-10-19','res/albums/songs/bohemian-rhapsody/hammer-to-fall-live-aid.mp3'),(28,1,2,'We Are The Champions (Live Aid)','res/albums/songs/bohemian-rhapsody/we-are-the-champions-live-aid.txt','00:03:57','2018-10-19','res/albums/songs/bohemian-rhapsody/we-are-the-champions-live-aid.mp3'),(29,1,2,'Don\'t Stop Me Now (Revisited)','res/albums/songs/bohemian-rhapsody/dont-stop-me-now-revisited.txt','00:03:38','2018-10-19','res/albums/songs/bohemian-rhapsody/dont-stop-me-now-revisited.mp3'),(30,1,2,'The Show Must Go On','res/albums/songs/bohemian-rhapsody/the-show-must-go-on.txt','00:04:32','2018-10-19','res/albums/songs/bohemian-rhapsody/the-show-must-go-on.mp3'),(31,1,3,'Smells Like Teen Spirit','res/albums/songs/nevermind/smells-like-teen-spirit.txt','00:05:01','1991-09-26','res/albums/songs/nevermind/smells-like-teen-spirit.mp3'),(32,1,3,'In Bloom','res/albums/songs/nevermind/in-bloom.txt','00:04:14','1991-09-26','res/albums/songs/nevermind/in-bloom.mp3'),(33,1,3,'Come As You Are','res/albums/songs/nevermind/come-as-you-are.txt','00:03:39','1991-09-26','res/albums/songs/nevermind/come-as-you-are.mp3'),(34,1,3,'Breed','res/albums/songs/nevermind/breed.txt','00:03:39','1991-09-26','res/albums/songs/nevermind/breed.mp3'),(35,1,3,'Lithium','res/albums/songs/nevermind/lithium.txt','00:04:17','1991-09-26','res/albums/songs/nevermind/lithium.mp3'),(36,1,3,'Polly','res/albums/songs/nevermind/polly.txt','00:02:57','1991-09-26','res/albums/songs/nevermind/polly.mp3'),(37,1,3,'Territorial Pissings','res/albums/songs/nevermind/territorial-pissings.txt','00:02:23','1991-09-26','res/albums/songs/nevermind/territorial-pissings.mp3'),(38,1,3,'Drain You','res/albums/songs/nevermind/drain-you.txt','00:03:44','1991-09-26','res/albums/songs/nevermind/drain-you.mp3'),(39,1,3,'Lounge Act','res/albums/songs/nevermind/lounge-act.txt','00:02:36','1991-09-26','res/albums/songs/nevermind/lounge-act.mp3'),(40,1,3,'Stay Away','res/albums/songs/nevermind/stay-away.txt','00:03:32','1991-09-26','res/albums/songs/nevermind/stay-away.mp3'),(41,1,3,'On A Plain','res/albums/songs/nevermind/on-a-plain.txt','00:03:16','1991-09-26','res/albums/songs/nevermind/on-a-plain.mp3'),(42,1,3,'Something In The Way','res/albums/songs/nevermind/something-in-the-way.txt','00:03:52','1991-09-26','res/albums/songs/nevermind/something-in-the-way.mp3'),(43,1,3,'Endless, Nameless','res/albums/songs/nevermind/endless-nameless.txt','00:06:44','1991-09-26','res/albums/songs/nevermind/endless-nameless.mp3'),(44,1,4,'Don\'t Panic','res/albums/songs/parachutes/dont-panic.txt','00:02:17','2000-07-10','res/albums/songs/parachutes/dont-panic.mp3'),(45,1,4,'Shiver','res/albums/songs/parachutes/shiver.txt','00:04:59','2000-07-10','res/albums/songs/parachutes/shiver.mp3'),(46,1,4,'Spies','res/albums/songs/parachutes/spies.txt','00:05:18','2000-07-10','res/albums/songs/parachutes/spies.mp3'),(47,1,4,'Sparks','res/albums/songs/parachutes/sparks.txt','00:03:47','2000-07-10','res/albums/songs/parachutes/sparks.mp3'),(48,1,4,'Yellow','res/albums/songs/parachutes/yellow.txt','00:04:29','2000-07-10','res/albums/songs/parachutes/yellow.mp3'),(49,1,4,'Trouble','res/albums/songs/parachutes/trouble.txt','00:04:30','2000-07-10','res/albums/songs/parachutes/trouble.mp3'),(50,1,4,'Parachutes','res/albums/songs/parachutes/parachutes.txt','00:00:46','2000-07-10','res/albums/songs/parachutes/parachutes.mp3'),(51,1,4,'High Speed','res/albums/songs/parachutes/high-speed.txt','00:04:14','2000-07-10','res/albums/songs/parachutes/high-speed.mp3'),(52,1,4,'We Never Change','res/albums/songs/parachutes/we-never-change.txt','00:04:09','2000-07-10','res/albums/songs/parachutes/we-never-change.mp3'),(53,1,4,'Everything\'s Not Lost','res/albums/songs/parachutes/everything-s-not-lost.txt\r\n','00:07:17','2000-07-10','res/albums/songs/parachutes/everything-s-not-lost.mp3\r\n'),(54,3,5,'!!!!!!!','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/!!!!!!.txt','00:00:14','2019-03-29','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/!!!!!!.mp3'),(55,3,5,'Bad Guy','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/bad-guy.txt','00:03:14','2019-03-29','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/bad-guy.mp3'),(56,3,5,'Xanny','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/xanny.txt','00:04:03','2019-03-29','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/xanny.mp3'),(57,3,5,'You Should See Me In A Crown','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/you-should-see-me-in-a-crown.txt','00:03:00','2019-03-29','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/you-should-see-me-in-a-crown.mp3'),(58,3,5,'All The Good Girls Go To Hell','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/all-the-good-girls-go-to-hell.txt','00:02:49','2019-03-29','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/all-the-good-girls-go-to-hell.mp3'),(59,3,5,'Wish You Were Gay','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/wish-you-were-gay.txt','00:03:42','2019-03-29','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/wish-you-were-gay.mp3'),(60,3,5,'When The Party\'s Over','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/when-the-partys-over.txt','00:03:16','2019-03-29','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/when-the-partys-over.mp3'),(61,3,5,'8','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/8.txt','00:02:53','2019-03-29','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/8.mp3'),(62,3,5,'My Strange Addiction','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/my-strange-addiction.txt','00:03:00','2019-03-29','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/my-strange-addiction.mp3'),(63,3,5,'Bury A Friend','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/bury-a-friend.txt','00:03:13','2019-03-29','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/bury-a-friend.mp3'),(64,3,5,'Ilomilo','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/ilomilo.txt','00:02:36','2019-03-29','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/ilomilo.mp3'),(65,3,5,'Listen Before I Go','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/listen-before-i-go.txt','00:04:02','2019-03-29','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/listen-before-i-go.mp3'),(66,3,5,'I Love You','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/i-love-you.txt','00:04:52','2019-03-29','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/i-love-you.mp3'),(67,3,5,'Goodbye','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/goodbye.txt','00:01:59','2019-03-29','res/albums/songs/when-we-all-fall-asleep-where-do-we-go/goodbye.mp3'),(68,10,6,'Ciega, sordomuda','res/albums/songs/donde-estan-los-ladrones/ciega-sordomuda.txt','00:04:27','1998-09-29','res/albums/songs/donde-estan-los-ladrones/ciega-sordomuda.mp3'),(69,10,6,'Si te vas','res/albums/songs/donde-estan-los-ladrones/si-te-vas.txt','00:03:32','1998-09-29','res/albums/songs/donde-estan-los-ladrones/si-te-vas.mp3'),(70,10,6,'Moscas en la casa','res/albums/songs/donde-estan-los-ladrones/moscas-en-la-casa.txt','00:03:31','1998-09-29','res/albums/songs/donde-estan-los-ladrones/moscas-en-la-casa.mp3'),(71,10,6,'No creo','res/albums/songs/donde-estan-los-ladrones/no-creo.txt','00:03:51','1998-09-29','res/albums/songs/donde-estan-los-ladrones/no-creo.mp3'),(72,10,6,'Inevitable','res/albums/songs/donde-estan-los-ladrones/inevitable.txt','00:03:14','1998-09-29','res/albums/songs/donde-estan-los-ladrones/inevitable.mp3'),(73,10,6,'Octavo día','res/albums/songs/donde-estan-los-ladrones/octavo-dia.txt','00:04:10','1998-09-29','res/albums/songs/donde-estan-los-ladrones/octavo-dia.mp3'),(74,10,6,'Que vuelvas','res/albums/songs/donde-estan-los-ladrones/que-vuelvas.txt','00:04:04','1998-09-29','res/albums/songs/donde-estan-los-ladrones/que-vuelvas.mp3'),(75,10,6,'Tú','res/albums/songs/donde-estan-los-ladrones/tu.txt','00:04:39','1998-09-29','res/albums/songs/donde-estan-los-ladrones/tu.mp3'),(76,10,6,'Dónde están los ladrones','res/albums/songs/donde-estan-los-ladrones/donde-estan-los-ladrones.txt','00:03:13','1998-09-29','res/albums/songs/donde-estan-los-ladrones/donde-estan-los-ladrones.mp3'),(77,10,6,'Sombra de ti','res/albums/songs/donde-estan-los-ladrones/sombra-de-ti.txt','00:03:37','1998-09-29','res/albums/songs/donde-estan-los-ladrones/sombra-de-ti.mp3'),(78,10,6,'Ojos así','res/albums/songs/donde-estan-los-ladrones/ojos-asi.txt','00:04:22','1998-09-29','res/albums/songs/donde-estan-los-ladrones/ojos-asi.mp3'),(79,4,7,'Talento de barrio','res/albums/songs/talento-de-barrio/talento-de-barrio.txt','00:03:34','2008-07-28','res/albums/songs/talento-de-barrio/talento-de-barrio.mp3'),(80,4,7,'Pose','res/albums/songs/talento-de-barrio/pose.txt','00:03:32','2008-07-28','res/albums/songs/talento-de-barrio/pose.mp3'),(81,4,7,'Somos de calle','res/albums/songs/talento-de-barrio/somos-de-calle.txt','00:04:09','2008-07-28','res/albums/songs/talento-de-barrio/somos-de-calle.mp3'),(82,4,7,'Llamado de emergencia','res/albums/songs/talento-de-barrio/llamado-de-emergencia.txt','00:03:49','2008-07-28','res/albums/songs/talento-de-barrio/llamado-de-emergencia.mp3'),(83,4,7,'Coraza divina','res/albums/songs/talento-de-barrio/coraza-divina.txt','00:04:07','2008-07-28','res/albums/songs/talento-de-barrio/coraza-divina.mp3'),(84,4,7,'Salgo pa\' la calle','res/albums/songs/talento-de-barrio/salgo-pa-la-calle.txt','00:03:42','2008-07-28','res/albums/songs/talento-de-barrio/salgo-pa-la-calle.mp3'),(85,4,7,'Me quedo contigo','res/albums/songs/talento-de-barrio/me-quedo-contigo.txt','00:03:36','2008-07-28','res/albums/songs/talento-de-barrio/me-quedo-contigo.mp3'),(86,4,7,'Pa\' kum pa\'','res/albums/songs/talento-de-barrio/pa-kum-pa.txt','00:03:13','2008-07-28','res/albums/songs/talento-de-barrio/pa-kum-pa.mp3'),(87,4,7,'Que tengo que hacer','res/albums/songs/talento-de-barrio/que-tengo-que-hacer.txt','00:03:43','2008-07-28','res/albums/songs/talento-de-barrio/que-tengo-que-hacer.mp3'),(88,4,7,'Sabor a melao','res/albums/songs/talento-de-barrio/sabor-a-melao.txt','00:03:49','2008-07-28','res/albums/songs/talento-de-barrio/sabor-a-melao.mp3'),(89,4,7,'¿Qué vas a hacer?','res/albums/songs/talento-de-barrio/que-vas-a-hacer.txt','00:03:39','2008-07-28','res/albums/songs/talento-de-barrio/que-vas-a-hacer.mp3'),(90,4,7,'Suelta','res/albums/songs/talento-de-barrio/suelta.txt','00:03:23','2008-07-28','res/albums/songs/talento-de-barrio/suelta.mp3'),(91,4,7,'Como yvone','res/albums/songs/talento-de-barrio/como-yvone.txt','00:03:38','2008-07-28','res/albums/songs/talento-de-barrio/como-yvone.mp3'),(92,4,7,'Jefe','res/albums/songs/talento-de-barrio/jefe.txt','00:03:32','2008-07-28','res/albums/songs/talento-de-barrio/jefe.mp3'),(93,4,7,'Solita y sola','res/albums/songs/talento-de-barrio/solita-y-sola.txt','00:03:53','2008-07-28','res/albums/songs/talento-de-barrio/solita-y-sola.mp3'),(94,4,7,'Señor oficial','res/albums/songs/talento-de-barrio/senor-oficial.txt','00:03:48','2008-07-28','res/albums/songs/talento-de-barrio/senor-oficial.mp3'),(95,7,8,'Keep the Family Close','res/albums/songs/views/keep-the-family-close.txt','00:05:28','2016-05-06','res/albums/songs/views/keep-the-family-close.mp3'),(96,7,8,'9','res/albums/songs/views/9.txt','00:04:15','2016-05-06','res/albums/songs/views/9.mp3'),(97,7,8,'U With Me?','res/albums/songs/views/u-with-me.txt','00:04:57','2016-05-06','res/albums/songs/views/u-with-me.mp3'),(98,7,8,'Feel No Ways','res/albums/songs/views/feel-no-ways.txt','00:04:00','2016-05-06','res/albums/songs/views/feel-no-ways.mp3'),(99,7,8,'Hype','res/albums/songs/views/hype.txt','00:03:29','2016-05-06','res/albums/songs/views/hype.mp3'),(100,7,8,'Weston Road Flows','res/albums/songs/views/weston-road-flows.txt','00:04:13','2016-05-06','res/albums/songs/views/weston-road-flows.mp3'),(101,7,8,'Redemption','res/albums/songs/views/redemption.txt','00:05:34','2016-05-06','res/albums/songs/views/redemption.mp3'),(102,7,8,'With You (feat. PARTYNEXTDOOR)','res/albums/songs/views/with-you.txt','00:03:15','2016-05-06','res/albums/songs/views/with-you.mp3'),(103,7,8,'Faithful (feat. Pimp C & dvsn)','res/albums/songs/views/faithful.txt','00:04:50','2016-05-06','res/albums/songs/views/faithful.mp3'),(104,7,8,'Still Here','res/albums/songs/views/still-here.txt','00:03:09','2016-05-06','res/albums/songs/views/still-here.mp3'),(105,7,8,'Controlla','res/albums/songs/views/controlla.txt','00:04:05','2016-05-06','res/albums/songs/views/controlla.mp3'),(106,7,8,'One Dance (feat. Wizkid & Kyla)','res/albums/songs/views/one-dance.txt','00:02:54','2016-05-06','res/albums/songs/views/one-dance.mp3'),(107,7,8,'Grammys (feat. Future)','res/albums/songs/views/grammys.txt','00:03:39','2016-05-06','res/albums/songs/views/grammys.mp3'),(108,7,8,'Childs Play','res/albums/songs/views/childs-play.txt','00:04:01','2016-05-06','res/albums/songs/views/childs-play.mp3'),(109,7,8,'Pop Style','res/albums/songs/views/pop-style.txt','00:03:32','2016-05-06','res/albums/songs/views/pop-style.mp3'),(110,7,8,'Too Good (feat. Rihanna)','res/albums/songs/views/too-good.txt','00:04:23','2016-05-06','res/albums/songs/views/too-good.mp3'),(111,7,8,'Summers Over Interlude','res/albums/songs/views/summers-over-interlude.txt','00:01:51','2016-05-06','res/albums/songs/views/summers-over-interlude.mp3'),(112,7,8,'Fire & Desire','res/albums/songs/views/fire-and-desire.txt','00:03:58','2016-05-06','res/albums/songs/views/fire-and-desire.mp3'),(113,7,8,'Views','res/albums/songs/views/views.txt','00:05:01','2016-05-06','res/albums/songs/views/views.mp3'),(114,7,8,'Hotline Bling (bonus track)','res/albums/songs/views/hotline-bling.txt','00:04:27','2016-05-06','res/albums/songs/views/hotline-bling.mp3'),(115,9,9,'Rolling in the Deep','res/albums/songs/21/rolling-in-the-deep.txt','00:03:48','2011-01-24','res/albums/songs/21/rolling-in-the-deep.mp3'),(116,9,9,'Rumour Has It','res/albums/songs/21/rumour-has-it.txt','00:03:43','2011-01-24','res/albums/songs/21/rumour-has-it.mp3'),(117,9,9,'Turning Tables','res/albums/songs/21/turning-tables.txt','00:04:10','2011-01-24','res/albums/songs/21/turning-tables.mp3'),(118,9,9,'Don\'t You Remember','res/albums/songs/21/dont-you-remember.txt','00:04:03','2011-01-24','res/albums/songs/21/dont-you-remember.mp3'),(119,9,9,'Set Fire to the Rain','res/albums/songs/21/set-fire-to-the-rain.txt','00:04:02','2011-01-24','res/albums/songs/21/set-fire-to-the-rain.mp3'),(120,9,9,'He Won\'t Go','res/albums/songs/21/he-wont-go.txt','00:04:38','2011-01-24','res/albums/songs/21/he-wont-go.mp3'),(121,9,9,'Take It All','res/albums/songs/21/take-it-all.txt','00:03:48','2011-01-24','res/albums/songs/21/take-it-all.mp3'),(122,9,9,'I\'ll Be Waiting','res/albums/songs/21/ill-be-waiting.txt','00:04:01','2011-01-24','res/albums/songs/21/ill-be-waiting.mp3'),(123,9,9,'One and Only','res/albums/songs/21/one-and-only.txt','00:05:48','2011-01-24','res/albums/songs/21/one-and-only.mp3'),(124,9,9,'Lovesong','res/albums/songs/21/lovesong.txt','00:05:16','2011-01-24','res/albums/songs/21/lovesong.mp3'),(125,9,9,'Someone Like You','res/albums/songs/21/someone-like-you.txt','00:04:45','2011-01-24','res/albums/songs/21/someone-like-you.mp3'),(126,8,10,'Do I Wanna Know?','res/albums/songs/am/do-i-wanna-know.txt','00:04:32','2013-09-09','res/albums/songs/am/do-i-wanna-know.mp3'),(127,8,10,'R U Mine?','res/albums/songs/am/r-u-mine.txt','00:03:21','2013-09-09','res/albums/songs/am/r-u-mine.mp3'),(128,8,10,'One for the Road','res/albums/songs/am/one-for-the-road.txt','00:03:26','2013-09-09','res/albums/songs/am/one-for-the-road.mp3'),(129,8,10,'Arabella','res/albums/songs/am/arabella.txt','00:03:27','2013-09-09','res/albums/songs/am/arabella.mp3'),(130,8,10,'I Want It All','res/albums/songs/am/i-want-it-all.txt','00:03:05','2013-09-09','res/albums/songs/am/i-want-it-all.mp3'),(131,8,10,'No. 1 Party Anthem','res/albums/songs/am/no-1-party-anthem.txt','00:04:03','2013-09-09','res/albums/songs/am/no-1-party-anthem.mp3'),(132,8,10,'Mad Sounds','res/albums/songs/am/mad-sounds.txt','00:03:35','2013-09-09','res/albums/songs/am/mad-sounds.mp3'),(133,8,10,'Fireside','res/albums/songs/am/fireside.txt','00:03:01','2013-09-09','res/albums/songs/am/fireside.mp3'),(134,8,10,'Why\'d You Only Call Me When You\'re High?','res/albums/songs/am/whyd-you-only-call-me-when-youre-high.txt','00:02:41','2013-09-09','res/albums/songs/am/whyd-you-only-call-me-when-youre-high.mp3'),(135,8,10,'Snap Out of It','res/albums/songs/am/snap-out-of-it.txt','00:03:13','2013-09-09','res/albums/songs/am/snap-out-of-it.mp3'),(136,8,10,'Knee Socks','res/albums/songs/am/knee-socks.txt','00:04:17','2013-09-09','res/albums/songs/am/knee-socks.mp3'),(137,8,10,'I Wanna Be Yours','res/albums/songs/am/i-wanna-be-yours.txt','00:03:04','2013-09-09','res/albums/songs/am/i-wanna-be-yours.mp3'),(138,11,11,'Cuando Me Altero','res/albums/songs/cementerio-de-raperos/cuando-me-altero.txt','00:02:55','2017-11-16','res/albums/songs/cementerio-de-raperos/cuando-me-altero.mp3'),(139,11,11,'Agresión','res/albums/songs/cementerio-de-raperos/agresion.txt','00:03:25','2017-11-16','res/albums/songs/cementerio-de-raperos/agresion.mp3'),(140,11,11,'Bien Locos','res/albums/songs/cementerio-de-raperos/bien-locos.txt','00:03:28','2017-11-16','res/albums/songs/cementerio-de-raperos/bien-locos.mp3'),(141,11,11,'Cuándo y Dónde','res/albums/songs/cementerio-de-raperos/cuando-y-donde.txt','00:03:28','2017-11-16','res/albums/songs/cementerio-de-raperos/cuando-y-donde.mp3'),(142,11,11,'El inicio de la Guerra','res/albums/songs/cementerio-de-raperos/el-inicio-de-la-guerra.txt','00:03:28','2017-11-16','res/albums/songs/cementerio-de-raperos/el-inicio-de-la-guerra.mp3'),(143,11,11,'Eme 43','res/albums/songs/cementerio-de-raperos/eme-43.txt','00:03:28','2017-11-16','res/albums/songs/cementerio-de-raperos/eme-43.mp3'),(144,11,11,'La Mujer Perfecta','res/albums/songs/cementerio-de-raperos/la-mujer-perfecta.txt','00:03:28','2017-11-16','res/albums/songs/cementerio-de-raperos/la-mujer-perfecta.mp3'),(145,11,11,'Me La Peló','res/albums/songs/cementerio-de-raperos/me-la-pelo.txt','00:03:28','2017-11-16','res/albums/songs/cementerio-de-raperos/me-la-pelo.mp3'),(146,11,11,'Nunca Ando Solo','res/albums/songs/cementerio-de-raperos/nunca-ando-solo.txt','00:02:51','2017-11-16','res/albums/songs/cementerio-de-raperos/nunca-ando-solo.mp3'),(147,11,11,'Pablito','res/albums/songs/cementerio-de-raperoso/pablito','04:55:00','2017-11-16','res/albums/songs/cementerio-de-raperos/pablito.mp3'),(148,11,11,'Perra Vida','res/albums/songs/cementerio-de-raperoso/perra-vida.txt','05:23:00','2017-11-16','res/albums/songs/cementerio-de-raperos/perra-vida.mp3'),(149,11,11,'Sureños','res/albums/songs/cementerio-de-raperoso/surenios.txt','03:02:00','2017-11-16','res/albums/songs/cementerio-de-raperos/surenios.mp3'),(150,11,11,'No Hay Falla','res/albums/songs/cementerio-de-raperoso/no-hay-falla.txt','06:49:00','2017-11-16','res/albums/songs/cementerio-de-raperos/no-hay-falla.mp3'),(151,11,11,'Corren Con Suerte','res/albums/songs/cementerio-de-raperoso/corren-con-suerte.txt','03:58:00','2017-11-16','res/albums/songs/cementerio-de-raperos/corren-con-suerte.mp3'),(152,11,11,'Trucha','res/albums/songs/cementerio-de-raperos/trucha.txt','04:39:00','2017-11-16','res/albums/songs/cementerio-de-raperos/trucha.mp3'),(153,11,11,'Crees Que Son Mentiras','res/albums/songs/cementerio-de-raperos/crees-que-son-mentiras.txt','03:01:00','2017-02-07','res/albums/songs/cementerio-de-raperos/crees-que-son-mentiras.mp3'),(154,11,11,'Desde Guanatos','res/albums/songs/cementerio-de-raperos/desde-guanatos.txt','03:31:00','2017-02-07','res/albums/songs/cementerio-de-raperos/desde-guanatos.mp3'),(155,11,11,'El Ambiente Huele a Mota','res/albums/songs/cementerio-de-raperos/el-ambiente-huele-a-mota.txt','04:19:00','2017-02-07','res/albums/songs/cementerio-de-raperos/el-ambiente-huele-a-mota.mp3');
/*!40000 ALTER TABLE `cancion` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `evitar_cancion_duplicada` BEFORE INSERT ON `cancion` FOR EACH ROW BEGIN
    DECLARE cantidad INT;

    SELECT COUNT(*)
    INTO cantidad
    FROM Cancion
    WHERE ID_album = NEW.ID_album
      AND Titulo = NEW.Titulo;

    IF cantidad > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Ya existe una canción con ese nombre en este álbum.';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `discografia`
--

DROP TABLE IF EXISTS `discografia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discografia` (
  `ID_discografia` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Logo` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_discografia`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discografia`
--

LOCK TABLES `discografia` WRITE;
/*!40000 ALTER TABLE `discografia` DISABLE KEYS */;
INSERT INTO `discografia` VALUES (1,'Elektra Record','res/discografia/img/elektra-record.png'),(2,'Virgin EMI','res/discografia/img/virgin-emi.png'),(3,'DGC Records','res/discografia/img/dgc-records.png'),(4,'Parlophone Records Ltd','res/discografia/img/parlophone-records-ltd.png'),(5,'Interscope Records','res/discografia/img/interscope-records.png'),(6,'Sony Music Latin','res/discografia/img/sony-music-latin.png'),(7,'El Cartel Records','res/discografia/img/el-cartel-records.png'),(8,'Cash Money Records','res/discografia/img/cash-money-records.png'),(9,'XL Recordings Ltd','res/discografia/img/xl-recordings-ltd.png'),(10,'Domino Records','res/discografia/img/domino-records.png'),(11,'Bear Busby Productions','res/discografia/img/bear-busby-productions.png');
/*!40000 ALTER TABLE `discografia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escucha`
--

DROP TABLE IF EXISTS `escucha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escucha` (
  `ID_usr_cancion` int(11) NOT NULL AUTO_INCREMENT,
  `ID_usuario` int(11) DEFAULT NULL,
  `ID_cancion` int(11) DEFAULT NULL,
  `Fecha` datetime NOT NULL,
  PRIMARY KEY (`ID_usr_cancion`),
  KEY `ID_usuario` (`ID_usuario`),
  KEY `ID_cancion` (`ID_cancion`),
  CONSTRAINT `escucha_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `escucha_ibfk_2` FOREIGN KEY (`ID_cancion`) REFERENCES `cancion` (`ID_cancion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escucha`
--

LOCK TABLES `escucha` WRITE;
/*!40000 ALTER TABLE `escucha` DISABLE KEYS */;
INSERT INTO `escucha` VALUES (1,1,2,'2025-04-17 13:20:42'),(2,2,89,'2025-01-09 14:01:11'),(3,3,111,'2025-04-02 10:49:30'),(4,4,20,'2025-03-03 06:49:21'),(5,5,55,'2025-04-15 12:32:14'),(6,6,69,'2025-02-05 08:59:30'),(7,7,15,'2025-04-17 19:48:30'),(8,8,86,'2025-04-11 15:40:22'),(9,9,54,'2025-04-24 10:22:23'),(10,10,81,'2025-04-02 02:34:48');
/*!40000 ALTER TABLE `escucha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genero` (
  `ID_genero` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'Rock'),(2,'Metal'),(3,'Pop'),(4,'Reguetón'),(5,'Alternativo'),(6,'Electrónica'),(7,'R&B'),(8,'Indie Rock'),(9,'Pop Soul'),(10,'Latin Pop'),(11,'Hip-Hop/Rap');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `playlist`
--

DROP TABLE IF EXISTS `playlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `playlist` (
  `ID_playlist` int(11) NOT NULL AUTO_INCREMENT,
  `ID_usuario` int(11) DEFAULT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Fecha_creacion` date NOT NULL,
  PRIMARY KEY (`ID_playlist`),
  KEY `ID_usuario` (`ID_usuario`),
  CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playlist`
--

LOCK TABLES `playlist` WRITE;
/*!40000 ALTER TABLE `playlist` DISABLE KEYS */;
INSERT INTO `playlist` VALUES (1,1,'Rock Legends','2025-04-15'),(2,2,'Acústico Chill','2025-04-14'),(3,3,'Pop Vibes','2025-03-12'),(4,4,'Éxitos Latinos','2025-02-19'),(5,5,'Rap y Flow','2025-01-23'),(6,6,'Indie Nights','2025-04-25'),(7,7,'Baladas del Corazón','2025-01-01'),(8,8,'Clásicos del Rock','2024-12-27'),(9,9,'Fiesta Total','2024-11-19'),(10,10,'Relax & Study','2025-01-21');
/*!40000 ALTER TABLE `playlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `playlist_cancion`
--

DROP TABLE IF EXISTS `playlist_cancion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `playlist_cancion` (
  `ID_playlist` int(11) DEFAULT NULL,
  `ID_cancion` int(11) DEFAULT NULL,
  KEY `ID_playlist` (`ID_playlist`),
  KEY `ID_cancion` (`ID_cancion`),
  CONSTRAINT `playlist_cancion_ibfk_1` FOREIGN KEY (`ID_playlist`) REFERENCES `playlist` (`ID_playlist`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `playlist_cancion_ibfk_2` FOREIGN KEY (`ID_cancion`) REFERENCES `cancion` (`ID_cancion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playlist_cancion`
--

LOCK TABLES `playlist_cancion` WRITE;
/*!40000 ALTER TABLE `playlist_cancion` DISABLE KEYS */;
INSERT INTO `playlist_cancion` VALUES (1,126),(1,127),(1,31),(1,32),(1,15),(2,132),(2,131),(2,124),(2,125),(2,44),(3,115),(3,119),(3,55),(3,54),(3,122),(4,68),(4,78),(4,80),(4,82),(4,87),(5,106),(5,114),(5,105),(5,91),(5,79),(6,129),(6,128),(6,48),(6,47),(6,136),(7,117),(7,118),(7,60),(7,137),(7,65),(8,19),(8,20),(8,33),(8,38),(8,129),(9,92),(9,93),(9,104),(9,113),(9,57),(10,45),(10,51),(10,61),(10,62),(10,133);
/*!40000 ALTER TABLE `playlist_cancion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `playlistconrock`
--

DROP TABLE IF EXISTS `playlistconrock`;
/*!50001 DROP VIEW IF EXISTS `playlistconrock`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `playlistconrock` AS SELECT
 1 AS `usuario`,
  1 AS `playlist`,
  1 AS `fecha_creacion`,
  1 AS `NumCanciones` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Apellido_Paterno` varchar(50) NOT NULL,
  `Apellido_Materno` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Adrian Kosey','Angeles','Ramos','a22300871@ceti.mx','Adri@n1504'),(2,'Adro Yael','Ornelas','Ornelas','a22300918@ceti.mx','AdroY@1404'),(3,'Ana','Martínez','Ríos','ana.martinez@gmail.com','ana45612'),(4,'Luis','Ramírez','Gómez','luis.ramirez@gmail.com','luis7890'),(5,'María','López','Santos','maria.lopez@hotmail.com','maria32112'),(6,'Jorge','Pérez','Torres','jorge.perez@hotmail.com','jorge654123'),(7,'Elena','Torres','Vega','elena.torres@gmail.com','elena852123'),(8,'Sofía','Delgado','Mendoza','sofia.delgado@gmail.com','sofia96312'),(9,'Carlos','Méndez','Silva','carlos.mendez@ceti.mx','carlos14712'),(10,'Paola','Rivera','Castillo','paola.rivera@gmail.com','paola258123'),(11,'Adotal','Ornelas','Ornelas','adotal1484@gmail.com','12345');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `albums2007_2017`
--

/*!50001 DROP VIEW IF EXISTS `albums2007_2017`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `albums2007_2017` AS select `artista`.`Nombre_artistico` AS `nombre_artistico`,`album`.`Titulo` AS `album`,`album`.`Fecha` AS `fecha`,`discografia`.`Nombre` AS `discografia` from (((`discografia` join `album` on(`discografia`.`ID_discografia` = `album`.`ID_discografia`)) join `album_artista` on(`album`.`ID_album` = `album_artista`.`ID_album`)) join `artista` on(`album_artista`.`ID_artista` = `artista`.`ID_artista`)) where `album`.`Fecha` between '2007-01-1' and '2017-01-01' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `playlistconrock`
--

/*!50001 DROP VIEW IF EXISTS `playlistconrock`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `playlistconrock` AS select `usuario`.`Nombre` AS `usuario`,`playlist`.`Nombre` AS `playlist`,`playlist`.`Fecha_creacion` AS `fecha_creacion`,count(`playlist_cancion`.`ID_cancion`) AS `NumCanciones` from (((`cancion` join `playlist_cancion` on(`cancion`.`ID_cancion` = `playlist_cancion`.`ID_cancion`)) join `playlist` on(`playlist_cancion`.`ID_playlist` = `playlist`.`ID_playlist`)) join `usuario` on(`playlist`.`ID_usuario` = `usuario`.`id_usuario`)) where `cancion`.`ID_genero` in (select `genero`.`ID_genero` from `genero` where `genero`.`Nombre` = 'Rock') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-16  2:07:59
