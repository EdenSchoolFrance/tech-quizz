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

- [x] Participer à un quiz
- [x] Affichage des questions
- [x] Affichage du résultat après la validation
- [x] Valider une réponse d'un quiz
- [x] Navigation vers la question suivante ou les résultats
- [x] Création d'un quiz
- [x] Suppression d'un quiz
- [x] Modification d'un quiz
- [x] Création d'une question
- [x] Modification d'une question
- [x] Suppression d'une question
- [x] Ajout d'un utilisateur
- [x] Modification d'un utilisateur
- [x] Suppression d'un utilisateur
- [x] Ajout d'un rôle sur un utilisateur
- [x] Changement d'état du bouton "submit" après la validation
- [x] Dashboard admin
- [x] Page des résultats
- [x] Page des quiz
- [x] Page d'authentification
- [x] Affichage de la page 404 

# Développement du site

- Créer et lancer de projet
- Création de la BDD
- Création des tests

# Développement front

- UI
- Vue mobile
- Vue tablette
- Vue PC
- Darkmode
- Affichage de la page des résultats
- Affichage de la page des résultats des utilisateur
- Page du quiz 
- Affichage de la liste des quiz
- Affichage de la page 404 

# Développement back

- Créer les vues 1 h 30 m
- Créer les controllers 1 h 30 m
- Créer les modèles 1 h 30 m
- Authentification 10 m
- Admin Dashboard 1 h 30
- Fix des bugs 40 m
- Upload d'images 10 m
- Connexion sécurisée

# Rôles

  - Administrateur : Gestion complète du site (Utilisateurs, Quiz)
  - Modérateur : Gestion des quiz
  - Utilisateur : Peut participer aux quiz et voir ses résultats


