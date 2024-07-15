# SOMMAIRE

- INTRODUCTION        
    - Prérequis
    - Installation des logiciels 

- IMPORTANT

- LA BASE DE DONNÉES
    - Présentation détaillée des tables

- CONCLUSION

<br> <br>

# INTRODUCTION 

L'entreprise MEDICOM est une industrie pharmaceutique fictive créée pour ce projet qui a pour but de créer un site qui servira à la gestion des stocks des médicaments dans l'entrprise enregistrés dans une table dans la base de données avec une possibilité de connexion avec des logins et des mots de passe enregistrés eux aussi dans la base de données.  

## Prérequis

### XAMPP 

XAMPP est un ensemble de logiciel qui va permettre facilement de déployer et de nous fournir un environnement de développement Apache et une base de données MySQL. 

Pour l'installation de XAMPP, il faut se diriger sur [ce lien](https://www.apachefriends.org/fr/download.html).

Suivez les instructions qui vous sont montrés durant l'installation et cliquer sur "Suivant" en laissant les choix par défaut.

## Installation des logiciels

Pour la mise en place et à l'accès de la base de donnée, nous devons ouvrir ***le panneau de contrôle de XAMPP*** et sélectionner les boutons "Start" pour **Apache** et **MySQL**. 
<br> 

## Important 

Les identifiants permettant de se connecter sont : 
- username = root
- password = root

<br>

# LA BASE DE DONNÉES

![Schema Base de donnee](sandbox/img/MEDICOM_DATABASE.png)

Derrière ce site web repose une base de donnée ordonnée et simple d'utilisation permettant une utlisation efficace au sein du code. La base de donnée contient 2 tables disticntes 

> **users**

La table "users" permet de stocker les informations de connexion des utilisateurs. Elle contient tous les noms d'utilisateurs et les mots de passe de connexion. Cette table est uniquement utilisée pour 2 cas principalement :
<br>

- Elle permet notamment durant le remplissage du formulaire lors d'une **"Connexion"** d'aller chercher les informations de connexion sur cette table et vérifier si le nom d'utilisateur existe et que le mot de passe rentré est bien attribué à ce nom d'utilisateur.

- Elle permet également lors du remplissage du formulaire d'**"Inscription"** d'envoyer les données dans cette table et ainsi enregistrer ces nouvelles informations dans la base de données pour une évetuelle connexion plus tard. 
<br> <br>

 > **médicaments**

 La table "médicaments" permet de stocker toutes les informations concernant les médicaments enregistrés dans la base de données. Elle contient les informations conçernant : les noms, le prix, la quantité, la date d'ajout ainsi que la date de modification de tous les produits.

 Cette table est notamment utilisée pour un cas principalement : 

 - **Pour la gestion des produits sur le dashboard** pour ainsi gérer via le site de modifier, supprimer, les informations concernant le stock pour chaque médicaments. 
 <br>











<br>

# CONCLUSION


La mise en place de ce site web a été conçue pour la gestion de stock et de commandes pour l'organisation fictive MEDICOM et est une des nombreuses façons d'optimiser la gestion de stock pour l'entrprise à travers ce site pour y informer les utilisateurs connectés.

La conception de la base de donnée derrière a été pensé pour une gestion simple et fiable, permettant une maintenance facile et solide pour une évolution majeure de l'entreprise.

