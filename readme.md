Bonjour, et bienvenue dans le readme du projet Symfony 'pokemon_X_hunter' de la matière Dev Web L3 MIAGE apprentissage Paris 1 Panthéon Sorbonne de Mr Vincent Poupet.
Ce projet a été réalisé par Ishac HADJ AHMED, Adrien MONTEIL et Nicolas DRAIN.
Vous retrouvez ici toutes les inscrutction pour lancer le projet le plus facilement et rapidement possible.

Étape 1 : Veuillez vous assurez que dans le fichier .php-version du projet la bonne version du php que vous utilisez soit indiquée. Il faut au minimum une version 8.0. Vous           pouvez vérifier la version de php que symfony utilise à l'aide de cette commande 'symfony local:php:list'.

Étape 2 : Veuillez vous assurez que dans le fichier php.ini de votre php cette ligne soit configurée de la sorte -> extension=intl et non comme celà -> ;extension=intl. 
          Ainsi que cette ligne soit configurée de la sorte -> extension=pdo_mysql et non comme celà -> ;extension=pdo_mysql.

Étape 3 : Vous pouvez désormais vous placer dans le projet et exécuter la commande 'composer install' permettant d'installer tous les composants nécessaire au fonctionnement du projet.

Étape 4 : Vous devez désormais créer un utilisateur sur phpMyAdmin et lui accorder tous les droits avec nom de compte : 'pokemonXhunter' et mot de passe : 'pokemonXhunter'.

Étape 5 : Vous pouvez désormais exécuter cette commande 'php bin/console doctrine:database:create' permettant de créer la base de données.

Étape 6 : Vous pouvez désormais exécuter cette commande 'php bin/console doctrine:migrations:migrate' et valider. Cela permet de créer toute les tables de la base de données.

Étape 7 : Vous pouvez désormais exécuter cette commande 'php bin/console doctrine:fixtures:load' et entrer la commande 'yes'. Cela permet d'insérer dans la base de données un jeu de données et ainsi permettre de tester au mieux l'application.

Étape 8 : Vous pouvez désormais exécuter la commande 'symfony server:start' pour démarrer le serveur.

Étape 9 : Vous pouvez soit vous connecter avec un compte admin (nom de compte : 'admin@demo.fr' mot de passe : 'azerty') possédant assez d'argent pour tester le plus efficacement toutes les fonctionnalités du site. Ou vous pouvez créer un compte et tester le site directement.

Étape 10 : Les nombreuses fonctionnalitées du site sont listée sur la page home de projet. Amusez-vous bien !