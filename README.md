# Instructions de démarrage pour le Projet Quiz

## 1. Forker le projet sur GitHub
- Allez sur la page du dépôt GitHub original du projet quiz.
- Cliquez sur le bouton **"Fork"** en haut à droite de la page pour créer une copie du dépôt dans votre propre compte GitHub.

## 2. Cloner votre fork sur votre machine locale
- Ouvrez votre terminal ou votre invite de commandes.
- Allez dans le répertoire où vous souhaitez cloner le projet.
- Exécutez la commande suivante pour cloner votre fork :

  ```bash
  git clone https://github.com/votre-utilisateur/quiz-project.git
Remplacez votre-utilisateur par votre nom d'utilisateur GitHub.

3. Configurer le dépôt distant
Lorsque vous clonez votre fork, le dépôt distant (origin) pointe vers votre propre fork. Vous allez maintenant ajouter le dépôt original comme une source distante pour pouvoir récupérer les mises à jour.


Accédez au répertoire du projet cloné :

 ```bash
cd quiz-project

Ajoutez le dépôt original comme upstream :

 ```bash
git remote add upstream https://github.com/auteur-original/quiz-project.git

Assurez-vous de remplacer auteur-original par le nom d'utilisateur du propriétaire du dépôt original.
```

## 4. Tâches / Sous-tâches


# Features
- [x] Participer à un quiz - 2h
- [x] Affichage des questions - 2h
- [x] Affichage du résultat après la validation - 2h
- [x] Valider une réponse d'un quiz - 2h
- [x] Navigation vers la question suivante ou les résultats - 0.5h
- [x] Création d'un quiz - 2h
- [x] Suppression d'un quiz - 0.5h
- [x] Modification d'un quiz - 0.5h
- [x] Création d'une question - 2h
- [x] Modification d'une question - 0.5h
- [x] Suppression d'une question - 0.5h
- [x] Ajout d'un utilisateur - 2h
- [x] Modification d'un utilisateur - 0.5h
- [x] Suppression d'un utilisateur - 0.5h
- [x] Ajout d'un rôle sur un utilisateur - 
- [x] Changement d'état du bouton "submit" après la validation - 0.5h
- [x] Dashboard admin - 2h
- [x] Page des résultats - 2h
- [x] Page des quiz - 2h
- [x] Page d'authentification - 2h
- [x] Affichage de la page 404 - 0.5h

# Développement du site - 4h

- Créer et lancer de projet - 2h
- Création de la BDD - 1h
- Création des tests - 1h

# Développement front - 23h

- UI - 8h
- Vue mobile - 2h
- Vue tablette - 2h
- Vue PC - 4h
- Darkmode - 2h
- Affichage de la page des résultats - 1h
- Affichage de la page des résultats des utilisateur - 1h
- Page du quiz - 2h
- Affichage de la liste des quiz - 0.5h
- Affichage de la page 404 - 0.5h

# Développement back - 21h

- Créer les vues - 3h
- Créer les controllers - 4h
- Créer les modèles - 1h
- Authentification - 2h
- Admin Dashboard - 8h
- Fix des bugs - 2h
- Connexion sécurisée - 1h

# Rôles
  - Administrateur : Gestion complète du site (Utilisateurs, Quiz)
  - Modérateur : Gestion des quiz
  - Utilisateur : Peut participer aux quiz et voir ses résultats

## DevNotes