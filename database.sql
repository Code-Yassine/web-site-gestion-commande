-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 21 déc. 2024 à 20:59
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_des_commandes`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `ID_A` int(11) NOT NULL,
  `NOM_UTILISATEUR` varchar(50) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ID_A`, `NOM_UTILISATEUR`, `PASSWORD`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `NOM` varchar(50) NOT NULL,
  `PRENOM` varchar(50) NOT NULL,
  `TELE` int(11) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `ADRESSE` varchar(100) NOT NULL,
  `ID_C` int(11) NOT NULL,
  `ID_A` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`NOM`, `PRENOM`, `TELE`, `EMAIL`, `ADRESSE`, `ID_C`, `ID_A`) VALUES
('koubi', 'mohamed', 658657384, 'ahemd@gmail.com', '400 شارع مراكش, مراكش, 40000, المغرب', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `NUM_C` int(11) NOT NULL,
  `ID_A` int(11) NOT NULL,
  `ID_P` int(11) NOT NULL,
  `ID_C` int(11) NOT NULL,
  `TOTAL_PRIX` decimal(10,0) NOT NULL,
  `QUANTITE_PRODUIT` int(11) NOT NULL,
  `ETAT` varchar(10) NOT NULL,
  `DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`NUM_C`, `ID_A`, `ID_P`, `ID_C`, `TOTAL_PRIX`, `QUANTITE_PRODUIT`, `ETAT`, `DATE`) VALUES
(3, 1, 6, 5, 120, 6, 'Non Valide', '2024-10-17');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `ID_P` int(11) NOT NULL,
  `ID_A` int(11) NOT NULL,
  `LIBELLE` varchar(50) NOT NULL,
  `PRIX` decimal(10,0) NOT NULL,
  `CATEGORIE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`ID_P`, `ID_A`, `LIBELLE`, `PRIX`, `CATEGORIE`) VALUES
(4, 1, 'evacuation tube D:23 EP:10', 40, 'pvc'),
(6, 1, 'evacuation raccords', 20, 'PVC Evacuation Raccords'),
(7, 1, 'evacuation tube', 30, 'PVC Evacuation tube');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_A`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID_C`),
  ADD KEY `FK_GESTION_CLIENTS` (`ID_A`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`NUM_C`),
  ADD KEY `FK_CONTENANT` (`ID_P`),
  ADD KEY `FK_DEMANDE` (`ID_C`),
  ADD KEY `FK_GESTION_COMMANDES` (`ID_A`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`ID_P`),
  ADD KEY `FK_GESTION_PRODUIT` (`ID_A`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_A` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `ID_C` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `NUM_C` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `ID_P` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_GESTION_CLIENTS` FOREIGN KEY (`ID_A`) REFERENCES `admin` (`ID_A`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_CONTENANT` FOREIGN KEY (`ID_P`) REFERENCES `produit` (`ID_P`),
  ADD CONSTRAINT `FK_DEMANDE` FOREIGN KEY (`ID_C`) REFERENCES `client` (`ID_C`),
  ADD CONSTRAINT `FK_GESTION_COMMANDES` FOREIGN KEY (`ID_A`) REFERENCES `admin` (`ID_A`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_GESTION_PRODUIT` FOREIGN KEY (`ID_A`) REFERENCES `admin` (`ID_A`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
