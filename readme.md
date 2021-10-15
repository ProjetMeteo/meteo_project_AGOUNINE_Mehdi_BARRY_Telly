# Application d'affichage de méteo

## Installation

prérequis :

- php
- mysql
- un serveur web tel Apache

Le plus simple étant d'avoir sur sa machine un outil tel xampp, wamp ou lamp selon votre systeme d'exploitation , la suite de ce guide va se consacrer à wamp mais l'installation est similaire avec d'autres logiciels.

- Se placer dans le dossier 'www' situé a la racine du dossier 'wamp' et cloner le projet : 
```sh
git clone https://github.com/ProjetMeteo/meteo_project_AGOUNINE_Mehdi_BARRY_Telly.git
```
<br>

Il faut ensuite créer la base de données puis importer les tables depuis le fichier meteo_project_bdd_am_bt.sql situé dans le dossier BDD.

Via PhpMyAdmin : 



- Créer une base de données portant le nom <i>meteo_project_bdd_am_bt</i>
- Sélectionner là , puis rendez vous dans l'onglet <i>importer</i>
- Ici vous pouvez choisir le fichier à importer et executer l'importation.

Une fois la base de données installé il ne reste qu'a lancer le projet !

<br>

### lancer le projet

- Pour lancer le projet il suffira de lancer le serveur wamp et le projet sera
accessible à l'adresse : localhost/meteo_project_AGOUNINE_Mehdi_BARRY_Telly

### Utilisation du projet

Ce projet permet en tapant le nom d'une ville , d'en connaitre la météo.

Lorsque vous commencez à écrire dans la barre de recherche , une liste suggestive de villes vous est proposée.

Il est possible de rechercher la météo d'une ville sans avoir de compte.

Cependant si vous voulez profiter de fonctionnalités supplémentaires , il faut posséder un compte sur l'application.

Un compte de test est disponible pour essayer de se connecter sur le projet :

mail : test@test.test

mdp : test

Vous pouvez sinon vous inscrire via le site, et votre profil sera enregisté en base de données.

Il n'y a aucune restriction sur les champs du formulaire sauf pour l'email qui doit etre de format :
truc@truc.truc

Un utilisateur connecté débloque l'accès à son historique de recherche disponible dans l'onglet <i>Mon compte</i>

De plus , il a la possibilité lorsqu'il effectue une recherche , d'enregistrer une ville recherchée dans ses favoris et d'y accéder via l'onglet <i>Mes villes favorites</i>

### notes pour les dev

- L'ensemble des fonctions liés la bdd se trouvent dans le fichier utils.php du dossier php_utils
- le traitement des formulaires de connexion et d'inscription est fait directement sur les pages concernées, pareil pour la modification des infos du compte.
- Il s'agit d'un projet étudiant, cette application n'est pas faite pour une utilisation professionelle , en raison d'un manque évident de sécurité.
