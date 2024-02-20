# 🌿🌺 A’rosa-je - Vos Plantes, Notre Passion ! 🌵🌻

## À Propos 🌟

Bienvenue dans l'univers de **A’rosa-je**, l'application innovante pour tous les amoureux des plantes ! 🌱 Chez A’rosa-je, nous connectons les passionnés de botanique avec des experts pour échanger astuces et conseils. Notre mission : aider chacun à faire prospérer ses plantes 🌼

## Technologies Utilisées 🛠️

- **Front-end** : <a href="https://tailwindcss.com/">
  <img src="https://img.shields.io/badge/%20%20-Tailwind%20-grey?logo=tailwind-css" alt="Badge Tailwind" width="80"/>
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

1. **📥 Clonez le projet** :

```bash
   git clone git@github.com:MSPR-A-rosa-je/A-rosa-je.git
```

2. **🛠️ Installez les dépendances** :

   - 🐳 Docker
   - 🔄 Docker-compose
   - 🖥️ Php 8.2
   - 🎼 Composer
   - 🌐 Node.js
   - 🧶 Npm

3. **🚀 Installer le projet** :

```bash
   cd A-rosa-je
   cp .env.example .env
```

```bash
   composer install
   npm install
```



4. **🔒 Configurez les permissions des dossiers** :

- Pour les distributions basées sur *Debian* :

```bash
   chmod -R 775 storage bootstrap/cache
   chown -R $USER:www-data storage bootstrap/cache
```

- Pour les distributions basées sur *Arch Linux* :

```bash
   sudo chmod -R 775 storage bootstrap/cache
   sudo chown -R $USER:http storage bootstrap/cache
```

5. **🔑 Générez une clé d'application** :

```bash
   php artisan key:generate
```

1. **🏗️ Construisez et lancez les conteneurs Docker** :

```bash
   docker-compose build
```

```bash
   docker-compose up -d
```

7. **🗄️ Effectuez les migrations de base de données** :

```bash
   docker-compose exec app php artisan migrate --seed
```
8. **Lancer le projet** :

```bash
    npm run dev
```

## Licence 📄

[![License GPL 3.0](https://img.shields.io/badge/License-_GPL%203.0-blue)](https://www.gnu.org/licenses/gpl-3.0.fr.html#license-text)

## Contact 📩

- **Développeur Principal** : [TODO](https://www.youtube.com/watch?v=dQw4w9WgXcQ)
- **Lien du Projet** : [TODO](https://www.youtube.com/watch?v=dQw4w9WgXcQ)
