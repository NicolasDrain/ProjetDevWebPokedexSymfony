Ceci est le readme du projet symfony de dev web
Elevator pitch : https://docs.google.com/document/d/1BOijE9LFD8S7Vvom4aoqdOCUWXI6rS0nA823ngTU72o/edit
Choix outils et rôles : https://docs.google.com/document/d/1hDS6FRxIzzNBMJN0BRfmkSVvpA7yOrdrsX6896YGk1Q/edit?usp=sharing
logo svg bootstrap : https://icons.getbootstrap.com/
check la version de php utilisée par symfony : symfony local:php:list
commande pour créer le fichier de version : echo 8.1.5 > ~/.php-version
étape 1 : exécuter composer install
étape 2 : créer un utilisateur avec nom de compte : "pokemonXhunter" et mot de passe : "pokemonXhunter" sur mysql
étape 3 : exécuter php bin/console doctrine:database:create
étape 4 : exécuter php bin/console doctrine:migrations:migrate
étape 5 : exécuter php bin/console doctrine:fixtures:load et écrire yes
étape finale : symfony server:start