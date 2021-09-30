# Super Agri PRO #

Application permettant la mise en relation de particuliers à la recherche de prestation de service, 
avec des professionnels qualifiés à Abidjan (Côte d'Ivoire)


## 📦 Installation 

Cloner le dépôt, puis installer les vendors :
```bash
composer install
```

Dupliquer le fichier `.env` vers `.env.local` et définir les variables d'environnement : exemple la chaine de 
connection Mysql
```dotenv
DATABASE_URL=mysql://root:root@localhost:3306/mpce?serverVersion=8&charset:utf8mb4
```

## ⚙️Configuration [DEV]

### 1) Docker
Se placer à la racine du projet, ouvrir un terminal puis lancer la commande suivante :
```bash
docker-compose --env-file .env.docker up -d --build
```

Une fois les machines Dockers démarrées, entrer dans les containers pour lancer les commandes d'initialisations :
```bash
docker exec -it --privileged cours-solid_php-fpm /bin/bash
```
> 📢️ N'effectuer ces actions qu'en environnement de développement !

Puis lancer l'installation avec composer puis initilisation de la BDD (Fixtures, Data obligatoires), Reset de la BDD :
```bash
composer dbinit
```

```bash
php bin/phpunit --testdox
```


## 📑  ️Testing [DEV] 

### 1) Création de la BDD de test :

```bash
php bin/console doctrine:database:drop --env=test --if-exists --force
php bin/console doctrine:database:create --env=test

```

### 2) Lancer les tests manuellement dans un terminal :

```bash
php bin/phpunit --testdox
```

### 3) Compiler le theme graphique (optionel)
Si vous voulez modifier les thème CSS, il faudra compiler les style Tailwind avec Webpack.\
Pour cela, installez les vendors javascript :
```bash
yarn install
```


