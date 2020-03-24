# magouille-api
Une API qui consiste à réaliser des transferts de joueurs entre clubs dans la limite des budgets.
## Installation
1. Installation des vendors :
```
composer install
```
2. Importation de la BDD dans PHPMyAdmin avec *magouille.sql*.
3. Lancement du serveur :
```
symfony server:start
```
4. Connexion à l'API avec ces logins :
```
username: Quentin
password: happyapi
```
5. Génération d'un JWToken avec Postman :
```
POST localhost:8000/login_check
Body :
raw JSON
{
	"username": "Quentin",
	"password": "happyapi"
}
```
6. Insertion du token dans "Authorize", précédé de "BEARER ".

Et voilà ! 😎
