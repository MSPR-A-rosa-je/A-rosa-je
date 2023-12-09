# 🌿🌺 A’rosa-je - Vos Plantes, Notre Passion ! 🌵🌻

## À Propos 🌟

Bienvenue dans l'univers de **A’rosa-je**, l'application innovante pour tous les amoureux des plantes ! 🌱 Chez A’rosa-je, nous connectons les passionnés de botanique avec des experts pour échanger astuces et conseils. Notre mission : aider chacun à faire prospérer ses plantes 🌼

## Technologies Utilisées 🛠️

- **Front-end** : <a href="https://vuejs.org/">
  <img src="https://img.shields.io/badge/%20%20-VueJS%20-grey?logo=vue.js" alt="Badge VueJS" width="70"/>
</a>

- **Back-end** : <a href="https://laravel.com">
  <img src="https://img.shields.io/badge/%20%20-Laravel%20-grey?logo=laravel" alt="Badge Laravel" width="80"/>
</a>

- **Base de données** : <a href="https://www.sqlite.org/index.html">
  <img src="https://img.shields.io/badge/%20%20-Sqlite%20-grey?logo=Sqlite" alt="Badge Docker" width="80"/>
</a>

- **Containerisation** : <a href="https://www.docker.com/">
  <img src="https://img.shields.io/badge/%20%20-Docker%20-grey?logo=docker" alt="Badge Docker" width="80"/>
</a>

## Fonctionnalités Clés 🔑

- **📸 Photos de Plantes** : Capturez et partagez vos plantes pour des conseils personnalisés
- **🌱 Conseils d'Experts** : Des recommandations pratiques par des botanistes aguerris
- **👤 Profil Utilisateur** : Gérez votre collection de plantes et suivez vos progrès

## Comment Ça Marche ? 🚀

 **Clonez le projet** :

 ```bash
 git clone git@github.com:MSPR-A-rosa-je/A-rosa-je.git
 ```

**Installez les dépendances** :

- Docker
- Docker-compose
- Php 8.2
- Composer
- Node.js
- Npm

**Installer le projet**:

```bash
cd A-rosa-je
```

```bash
composer install
npm install 
```

```bash
cp .env.example .env
```

```bash
chmod -R 775 storage bootstrap/cache
chown -R $USER:www-data storage bootstrap/cache
```

```bash
php artisan key:generate
```

Copiez la clé générée dans le fichier *.env* ```APP_KEY=``` et collez-la dans le fichier *docker-compose.yml* à la ligne 14 ```APP_KEY:```

```bash
docker-compose build
```

 **Lancez l'appli et les migrations de base de données** :

```bash
docker-compose up -d
```

```bash
docker-compose exec app php artisan migrate
```

## Licence 📄

[![License GPL 3.0](https://img.shields.io/badge/License-_GPL%203.0-blue)](https://www.gnu.org/licenses/gpl-3.0.fr.html#license-text)

## Contact 📩

- **Développeur Principal** : [TODO](https://www.youtube.com/watch?v=dQw4w9WgXcQ)
- **Lien du Projet** : [TODO](https://www.youtube.com/watch?v=dQw4w9WgXcQ)
