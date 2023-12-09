# 🌿🌺 A’rosa-je - Your Plants, Our Passion! 🌵🌻

## About 🌟

Welcome to the world of **A’rosa-je**, the innovative app for all plant lovers! 🌱 At A’rosa-je, we connect botany enthusiasts with experts to exchange tips and advice. Our mission: to help everyone make their plants thrive 🌼

## Technologies Used 🛠️

- **Front-end** : [VueJS](https://vuejs.org/)
- **Back-end** : [Laravel](https://laravel.com)
- **Database** : [SQLite](https://www.sqlite.org/index.html)
- **Containerization** : [Docker](https://www.docker.com/)

## Key Features 🔑

- **📸 Plant Photos** : Capture and share your plants for personalized advice
- **🌱 Expert Advice** : Practical recommendations from seasoned botanists
- **👤 User Profile** : Manage your plant collection and track your progress

## How It Works? 🚀

1. **📥 Clone the project** :

```bash
   git clone git@github.com:MSPR-A-rosa-je/A-rosa-je.git
```

2. **🛠️ Install dependencies** :

   - 🐳 Docker
   - 🔄 Docker-compose
   - 🖥️ Php 8.2
   - 🎼 Composer
   - 🌐 Node.js
   - 🧶 Npm

3. **🚀 Install the project** :
   
```bash
   cd A-rosa-je
   cp .env.example .env
```

```bash
   composer install
   npm install
```



4. **🔒 Configure folder permissions** :

- For Debian-based distributions:

```bash
   chmod -R 775 storage bootstrap/cache
   chown -R $USER:www-data storage bootstrap/cache
```

-  For Arch Linux-based distributions:
  
```bash
   sudo chmod -R 775 storage bootstrap/cache
   sudo chown -R $USER:http storage bootstrap/cache
```

5. **🔑 Generate an application key** :

```bash
   php artisan key:generate
```

Copy the generated key into the *.env* file `APP_KEY=` and paste it into the *docker-compose.yml* file at line 14 `APP_KEY:`

6. **🏗️ Build and launch Docker containers** :

```bash
   docker-compose build
```

```bash
   docker-compose up -d
```

7. **🗄️ Perform database migrations** :

```bash
   docker-compose exec app php artisan migrate
```


## License 📄

[GPL 3.0 License](https://www.gnu.org/licenses/gpl-3.0.fr.html#license-text)

## Contact 📩

- **Lead Developer** : [TODO](https://www.youtube.com/watch?v=dQw4w9WgXcQ)
- **Project Link** : [TODO](https://www.youtube.com/watch?v=dQw4w9WgXcQ)
