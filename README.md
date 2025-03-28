# Projet TechQuizz

Application de gestion de quiz.

## Prérequis

- PHP 7.4 ou +
- MySQL 5.7 ou +
- Composer
- Un serveur web 

## Installation

1. Clonez le dépôt :
```bash
   git clone `https://github.com/EdenSchoolFrance/tech-quizz.git`
   cd tech-quizz
   git checkout `GroupeGreenThumbs`
```

2. Installez les dépendances avec Composer :
```bash
   composer install
```

3. Configurez la base de données :
   - Créez une base de données MySQL
   - Importez le fichier `quizz_app.sql` dans phpmyadmin

4. Démarrez le serveur :
```bash
   cd public
   php -S localhost:8000
```
5. Démarrez l'api :
```bash
   cd api
   php -S localhost:8001
```

6. Démarrez le front :
```bash
   npm install
   npm run dev
```

7. Accédez à l'application :
   - Ouvrez votre navigateur et visitez `http://localhost:8000`

8. Pour lancer les tests unitaires :
```bash
   ./vendor/bin/phpunit Tests/FileNameTest.php
```

## Tâches / Sous-tâches

# Features
- ✅ Participer à un quiz - 2h
- ✅ Affichage des questions - 2h
- ✅ Affichage du résultat après la validation - 2h
- ✅ Valider une réponse d'un quiz - 2h
- ✅ Navigation vers la question suivante ou les résultats - 0.5h
- ✅ Création d'un quiz - 2h
- ✅ Suppression d'un quiz - 0.5h
- ✅ Modification d'un quiz - 0.5h
- ✅ Création d'une question - 2h
- ✅ Modification d'une question - 0.5h
- ✅ Suppression d'une question - 0.5h
- ✅ Ajout d'un utilisateur - 2h
- ✅ Modification d'un utilisateur - 0.5h
- ✅ Suppression d'un utilisateur - 0.5h
- ✅ Ajout d'un rôle sur un utilisateur - 
- ✅ Changement d'état du bouton "submit" après la validation - 0.5h
- ✅ Dashboard admin - 2h
- ✅ Page des résultats - 2h
- ✅ Page des quiz - 2h
- ✅ Page d'authentification - 2h
- ✅ Affichage de la page 404 - 0.5h

# Développement du site - 4h

- Créer et lancer de projet - 2h
- Création de la BDD - 1h
- Création des tests - 1h

# Développement front - 23h

- 🟩 UI - 8h
- 🟩 Vue mobile - 2h
- 🟩 Vue tablette - 2h
- ✅ Vue PC - 4h
- ✅ Darkmode - 2h
- ✅ Affichage de la page des résultats - 1h
- ✅ Affichage de la page des résultats des utilisateur - 1h
- ✅ Page du quiz - 2h
- ✅ Affichage de la liste des quiz - 0.5h
- ✅ Affichage de la page 404 - 0.5h

# Développement back - 21h

- ✅ Créer les vues - 3h
- ✅ Créer les controllers - 4h
- ✅ Créer les modèles - 1h
- ✅ Authentification - 2h
- ✅ Admin Dashboard - 8h
- ✅ Fix des bugs - 2h
- ✅ Connexion sécurisée - 1h

## Features manquantes

- ❌ 

# Rôles
  - Administrateur : Gestion complète du site (Utilisateurs, Quiz)
  - Modérateur : Gestion des quiz
  - Utilisateur : Peut participer aux quiz et voir ses résultats

## DevNotes