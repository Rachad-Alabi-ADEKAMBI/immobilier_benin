# 🏠 Immobilier Benin

**Immobilier Benin** is a modern and responsive web platform built with Laravel. It allows users in Benin to easily post, browse, and manage real estate listings. Whether you're a buyer, seller, or agent, this app simplifies property transactions through an intuitive user interface.

---

## 🌟 Features

-   User registration and login (Laravel Breeze)
-   Post, update, and delete real estate ads
-   Search and filter properties by type, location, and price
-   Upload property images
-   Role-based access control (e.g. buyer, seller, agent)
-   Responsive design for all screen sizes
-   Contact system between users

---

## ⚙️ Technologies Used

-   Laravel 10+
-   PHP 8.2+
-   MySQL
-   Blade + Tailwind CSS or Bootstrap
-   Laravel Breeze (Auth Scaffolding)
-   JavaScript (vanilla or Alpine.js)

---

## 🚀 Getting Started

Follow these steps to set up the project locally.

### 1. Clone the repository

```bash
git clone https://github.com/your-username/immobilier-benin.git
cd immobilier-benin
```

### 2. Install dependencies

```bash
composer install
npm install && npm run dev
```

### 3. Create environment file

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Set up your database

Open the `.env` file and configure your database connection:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=immobilier_benin
DB_USERNAME=root
DB_PASSWORD=
```

Then create the database manually in your MySQL server (e.g., via phpMyAdmin or CLI).

### 5. Run migrations and seeders

```bash
php artisan migrate:fresh --seed
```

This will create all tables and insert a test user for login.

### 6. Start the development server

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

---

## 🔐 Default Test User

After running seeders, use this account to log in:

```
Email: test@example.com
Password: password
```

---

## 📂 Folder Structure Overview

```
immobilier-benin/
├── app/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   ├── views/
│   ├── css/
│   └── js/
├── routes/
│   └── web.php
├── .env
└── README.md
```

---

## 🤝 Contributing

Feel free to fork the project, make changes, and submit a pull request. All contributions are welcome.

---

## 📄 License

This project is open-source and licensed under the **MIT License**.

---

**Rachad**  
Country: Benin

If you’re interested in working with me or have suggestions, feel free to reach out!
