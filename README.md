# Symfony REST API + Oauth2

[![N|Solid](https://www.shareicon.net/data/256x256/2016/06/19/603895_prog_512x512.png)](https://symfony.com/)


# Api REST créée avec le Framework Symfony

  - Version 4.2


## Installation

Cloner le projet

```sh
$ git clone https://github.com/AugustinBrocquet/symfony_rest_api.git
```

Installer les dépendances PHP.

```sh
$ composer install
```

### Dépendance PHP requises


| Dépendance | Commandes |
| ------ | ------ |
| server | composer require server --dev |
| FOSRestBundle | composer require friendsofsymfony/rest-bundle |
| JMSSerializer | composer require jms/serializer-bundle |
| SensioFrameworkExtraBundle | composer require sensio/framework-extra-bundle |
| SymfonyValidator | composer require symfony/validator |
| SymfonyOrmPack | composer require symfony/orm-pack |
| FOSUserBundle | composer require friendsofsymfony/user-bundle |
| FOSOauthServerBundle | composer require friendsofsymfony/oauth-server-bundle |
| SwiftmailderBundle | composer require swiftmailer-bundle |
| SymfonyTranslation| composer require symfony/translation |


### Développement

Copier le fichier .env.dist et le renomer en .env

```
$ ./.env
$ ./.env.dist
```

Remplacer le bd_user et le db_password par db_name par votre identifients BDD


Démarer votre serveur local

```
$ php bin/console server:run
```

Créer la base de données

```
$ php bin/console doctrine:database:create
```

Créer nos tables via les Entités

```
$ php bin/console doctrine:schema:create
```

## Test

Création d'un utilisateur pour l'Api

```
$ php bin/console fos:user:create
```

Création du Client

```
$ http://127.0.0.1:8000/createClient
{
    "redirect-uri": "url.test.dev",
	"grant-type": "password"
}

Réponse : 
{
    "client_id": "2_1qwrj2u31u4koscs4ckk4cog8ooo4o8o4kgkg8s4gokgg04g8s",
    "client_secret": "1yfhvyyxiask00sg8ww0gc8cc0sc0kocs4cws4oc4w0wkok8cs"
}
```

Récupérer l'access_token de type Bearer Token

```
$ http://127.0.0.1:8000/oauth/v2/token
{
	"client_id": "1_4r6gtm58xq0w4og84gc08k80s40gw80c4c4wcsgw04sskk80go",
	"client_secret": "2c9615p0yy688go4ws48cg4kgooo8c0kskscsgos048w4swcgk",
	"grant_type": "password",
	"username": "user",
	"password": "user_password"
}
(user et user_password du user créé avec la commande php bin/console fos:user:create)

Réponse : 
{
    "access_token": "OGZmMzM5NWIxOTAwOTAwNjZlZWY3NGRkN2Q2YTNlOTlmOTMzZWJhYmM1Y2M1OThiYjdiZTU1Mzk5YzNjMWZkOQ",
    "expires_in": 86400,
    "token_type": "bearer",
    "scope": null,
    "refresh_token": "NjhlMGJmYjg5OTJmNzYwZmNiZmY4ZDIxNTJhZWQ2OGYwMTMwNmZkNmFlMTVjZTBiYWU5M2FhOTI2ODFiNGI1Zg"
}
```

Ajouter un produit
```
POST : http://127.0.0.1:8000/api/product
Mettre Bearer Token en autorisation et copier votre acces_token
{
	"name": "Samsung Galaxy Note9",
	"description": "Système d'exploitation Android"
}
```

Récupérer les produits
```
GET : http://127.0.0.1:8000/api/products
```

Récupérer un produit
```
GET : http://127.0.0.1:8000/api/product/1
```






