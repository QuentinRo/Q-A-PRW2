# Q-A-PRW2
Feedback instané et annonyme en laravel 5.7

## Prérequis
+ commander
- laravel
* php artisan
## Installation de l'application

Cloner le repository sur votre environnement : <br>
`git clone https://github.com/QuentinRo/Q-A-PRW2.git `**Name of the project**``

Une fois ceci fait, dirigez vous dans le dossier de l'application et lancez la commande suivante : <br>
`composer install`

Créez une copie du fichier .env.example <br>
`cp .env.example .env`

Genérez une clé de l'application <br>
`php artisan key:generate`

Configurer la base de donnée sur votre serveur. Le fichier se trouve dans "Database/**QAbase.sql**" <br>
configurez le fichier .env pour donner l'accés à votre nouvelle base de donnée

L'application ne nécessite pas de données de base afin de fonctionner 

## Utilisation de l'application

les pages de l'administrateur ne comprennent pas de liens. Mais peuvent être accédées en ajoutant `/teacher` à L'url
