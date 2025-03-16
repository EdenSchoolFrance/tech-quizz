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


