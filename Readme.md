# ZooPedia - Application Éducative sur les Animaux

## 📋 Description du Projet
ZooPedia est une application web interactive conçue pour les crèches et écoles maternelles. Elle permet aux enfants d'apprendre sur les animaux, leurs habitats et leurs régimes alimentaires de manière ludique et éducative.

## 🎯 Objectifs
- Créer une interface simple et intuitive adaptée aux tout-petits
- Faciliter la mémorisation des animaux par le jeu
- Offrir un outil pédagogique aux éducateurs
- Tester les connaissances des enfants de manière interactive

## 👥 User Stories

### Jour 1 - Modélisation
- **US1** : En tant que concepteur, je vais faire un diagramme de cas d'utilisation pour les fonctions principales
- **US2** : En tant que concepteur, je vais dessiner la base de données (diagramme ERD)

### Jour 2 - Base de Données
- **US3** : En tant que développeur Back-End, je vais créer une base de données avec les tables `animal` et `habitats`
- **US4** : En tant que développeur Back-End, je vais écrire des requêtes SQL pour manipuler les données

### Jour 3 - Développement PHP
- **US5** : En tant que développeur Back-End, je vais coder en PHP pour les actions CRUD

### Jour 4 - Fonctionnalités Avancées
- **US6** : En tant que développeur, je veux créer des filtres pour chercher par habitat ou type alimentaire
- **US7** : En tant que développeur, je veux intégrer des graphiques montrant les statistiques des animaux

### Bonus
- **BONUS1** : En tant que développeur, je veux implémenter le changement de langue français/anglais
- **BONUS2** : En tant que développeur, je dois créer un jeu qui utilise des images et des sons d'animaux

## 🗄️ Structure de la Base de Données

### Table `animal`
| Champ | Type | Description |
|-------|------|-------------|
| ID | INT (PK) | Identifiant unique de l'animal |
| Nom | VARCHAR(100) | Nom de l'animal |
| Type_alimentaire | ENUM('Carnivore','Herbivore','Omnivore') | Type alimentaire |
| Image | VARCHAR(255) | Chemin vers l'image |
| habitat_id | INT (FK) | Référence à l'habitat |

### Table `habitats`
| Champ | Type | Description |
|-------|------|-------------|
| IdHab | INT (PK) | Identifiant unique de l'habitat |
| NomHab | VARCHAR(100) | Nom de l'habitat |
| Description_Hab | TEXT | Description de l'habitat |

## 🛠️ Technologies Utilisées

### Backend
- PHP 7.4+
- MySQL 5.7+
- PDO pour la connexion à la base de données

### Frontend
- HTML5
- CSS3 (avec design adapté aux enfants)
- JavaScript (pour l'interactivité)
- Chart.js (pour les graphiques)

### Outils
- Git pour le contrôle de version
- XAMPP/MAMP/WAMP pour l'environnement de développement
- Visual Studio Code comme éditeur


# 📊 Fonctionnalités Principales

## CRUD des Animaux
- Ajout d'animaux avec upload d'images
- Modification des informations existantes
- Suppression d'animaux
- Affichage de la liste avec pagination

## Gestion des Habitats
- Création de nouveaux habitats
- Modification des descriptions
- Association animaux-habitats

## Filtres et Recherche
- Filtrage par type alimentaire
- Filtrage par habitat
- Recherche par nom d'animal

## Statistiques
- Graphique des animaux par habitat
- Graphique des animaux par type alimentaire
- Tableau de bord éducatif

## Jeu Éducatif
- Quiz d'identification d'animaux
- Association son-image
- Score et progression

# 🔒 Sécurité
- Protection contre les injections SQL (PDO prepared statements)
- Validation des fichiers uploadés
- Échappement des données utilisateur
- Gestion des sessions sécurisée

# 🚀 Fonctionnalités Bonus Implémentées

## Changement de Langue
- Interface disponible en français et anglais
- Switch rapide entre les langues
- Traduction de tous les textes dynamiques

## Jeu Interactif
- 3 modes de jeu différents
- Sons d'animaux réels
- Interface colorée et adaptée aux enfants
- Système de score et de récompenses

## Prérequis
1. Serveur web local (XAMPP, MAMP, ou WAMP)
2. PHP 7.4 ou supérieur
3. MySQL 5.7 ou supérieur
4. Navigateur web moderne

## Étapes d'installation

### 1. **Cloner le projet** :
```bash
git clone [https://github.com/fadiinsaf/Zoo-Encyclop-die.git]
```
### 2. **Importer la base de données** :
- Démarrer Apache et MySQL dans XAMPP
- Ouvrir phpMyAdmin (http://localhost/phpmyadmin)
- Créer une nouvelle base de données `zoo_db`
- Importer le fichier `zoo_db.sql`

### 3. **Configurer la connexion à la base** :
Modifier le fichier `includes/config/database.php`

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'zoo_db');
```

### 4. **Démarrer l'application** :
- Copier le projet dans le dossier `htdocs` (XAMPP)
- Accéder à `http://localhost/zoo-pedia/`


## 👍 Author
**Fadi Insaf** – [GitHub](https://github.com/fadiinsaf) | [Email](mailto:fadiinafff@gmail.com)