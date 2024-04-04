-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: laravel
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
USE laravel;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'thriller','#ff0000',NULL,NULL),(2,'comedy','#ffff00',NULL,NULL),(3,'self-help','#ffffff',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `books` WRITE;
INSERT INTO `books` VALUES (1,'Gone Girl',1,'Gone Girl is a 2012 crime thriller novel by American writer Gillian Flynn. It was published by Crown Publishing Group in June 2012. The novel became popular and made the New York Times Best Seller list. The sense of suspense in the novel comes from whether or not Nick Dunne is involved in the disappearance of his wife Amy.',3,'Gillian Flynn','9780307588364',NULL,NULL),(2,'I\'d Like to Play Alone, Please: Essays',2,'From a massively successful stand-up comedian and co-host of chart-topping podcasts “2 Bears 1 Cave” and “Your Mom’s House,” hilarious real-life stories of parenting, celebrity encounters, youthful mistakes, misanthropy, and so much more. ',3,'Tom Segura','9781538704639',NULL,NULL),(3,'Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones',3,'No matter your goals, Atomic Habits offers a proven framework for improving--every day. James Clear, one of the world\'s leading experts on habit formation, reveals practical strategies that will teach you exactly how to form good habits, break bad ones, and master the tiny behaviors that lead to remarkable results.',2,'James Clear','9780735211292',NULL,NULL);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;


LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES (1,'admin','admin@gmail.com',NULL,'$2y$10$raZZ9ij5JtDAG8SzY.Qxe.o8RWM8ZK6OvxtogdzAlqVXnvAAdo4zm',NULL,'2024-03-31 05:40:46','2024-03-31 05:40:46','admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
