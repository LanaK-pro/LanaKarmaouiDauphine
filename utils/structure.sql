DROP DATABASE IF EXISTS dauphineexam;

CREATE DATABASE dauphineexam;

USE dauphineexam;

DROP TABLE IF EXISTS `annonce`;

CREATE TABLE `annonce` (
    `id` int(11) NOT NULL AUTO_INCREMENT, `imageUrl` varchar(250) DEFAULT NULL, `contenu` text NOT NULL, `titre` varchar(250) NOT NULL, `auteur` varchar(250) NOT NULL, `datePublication` DATETIME NOT NULL, PRIMARY KEY (`id`), UNIQUE KEY `annonce_id_uindex` (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
/*!40101 SET character_set_client = @saved_cs_client */
;

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `utilisateur` (
    `id` int(11) NOT NULL AUTO_INCREMENT, `username` varchar(250) NOT NULL, `nom` varchar(250) NOT NULL, `prenom` varchar(250) NOT NULL, `password` varchar(250) NOT NULL, PRIMARY KEY (`id`), UNIQUE KEY `utilisateur_id_uindex` (`id`), UNIQUE KEY `utilisateur_login_uindex` (`username`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
/*!40101 SET character_set_client = @saved_cs_client */
;

/* creation de la nouvelle table article*/
CREATE TABLE articles (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, title VARCHAR(300) NOT NULL, image TEXT, content TEXT NOT NULL, author VARCHAR(250) NOT NULL, published DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);