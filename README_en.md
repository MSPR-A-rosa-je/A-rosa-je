# 🌿🌺 A’rosa-je - Your Plants, Our Passion! 🌵🌻

## About 🌟

Welcome to the world of **A’rosa-je**, the innovative app for all plant lovers! 🌱 At A’rosa-je, we connect botany enthusiasts with experts to exchange tips and advice. Our mission: to help everyone make their plants thrive 🌼

## Technologies Used 🛠️

- **Front-end** : <a href="https://vuejs.org/">
  <img src="https://img.shields.io/badge/%20%20-VueJS%20-grey?logo=vue.js" alt="Badge VueJS" width="70"/>
</a>

- **Back-end** : <a href="https://laravel.com">
  <img src="https://img.shields.io/badge/%20%20-Laravel%20-grey?logo=laravel" alt="Badge Laravel" width="80"/>
</a>

- **Database** : <a href="https://www.sqlite.org/index.html">
  <img src="https://img.shields.io/badge/%20%20-Sqlite%20-grey?logo=Sqlite" alt="Badge Docker" width="80"/>
</a>

- **Containerization** : <a href="https://www.docker.com/">
  <img src="https://img.shields.io/badge/%20%20-Docker%20-grey?logo=docker" alt="Badge Docker" width="80"/>
</a>

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

6. **🏗️ Build and launch Docker containers** :

```bash
   docker-compose build
```

```bash
   docker-compose up -d
```

7. **🗄️ Perform database migrations** :

```bash
   docker-compose exec app php artisan migrate --seed
```

8. **Start project** :

```bash
   npm run dev 
```

## License 📄

[GPL 3.0 License](https://www.gnu.org/licenses/gpl-3.0.fr.html#license-text)

## Contact 📩

- **Lead Developer** : [TODO](https://www.youtube.com/watch?v=dQw4w9WgXcQ)
- **Project Link** : [TODO](https://www.youtube.com/watch?v=dQw4w9WgXcQ)
