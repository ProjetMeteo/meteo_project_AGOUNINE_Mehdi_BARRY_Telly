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