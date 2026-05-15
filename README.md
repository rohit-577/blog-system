

BlogYaari – Blog Management System

A modern and responsive Blog Management System built using Laravel, PHP, MySQL, Bootstrap, jQuery, AJAX, and CKEditor.

This project was developed as a complete full-stack blogging platform with an admin dashboard, rich text editor, AJAX-powered filtering, responsive UI, and live deployment support.

---

# Live Demo

### Frontend

https://blog-system-jytu.onrender.com

### Admin Panel

https://blog-system-jytu.onrender.com/admin/login

---

# Admin Credentials


Email: admin@blogsystem.com
Password: admin123


# Features

## Frontend Features

* Responsive modern UI
* Dynamic blog listing
* Category filtering using AJAX
* Real-time search functionality
* Blog detail pages
* Mobile-friendly layout
* Auto-updating content from database
* Featured images support

---

## Admin Panel Features

* Secure admin login system
* Create, edit and delete blogs
* Rich text editor using CKEditor
* Table support inside editor
* Image upload support
* Text formatting tools
* Category management
* Automatic date handling
* Live image preview
* Character counters

---

# Technologies Used

## Backend

* Laravel
* PHP 8+
* MySQL
* Eloquent ORM
* MVC Architecture

## Frontend

* HTML5
* CSS3
* Bootstrap 5
* JavaScript
* jQuery
* AJAX

## Editor

* CKEditor 5

## Tools & Services

* XAMPP
* Composer
* Git & GitHub
* Railway MySQL Database
* Render Deployment
* Docker

---

# Local Setup Guide

## 1. Clone Repository

```bash
git clone YOUR_GITHUB_REPOSITORY_LINK
cd blog-system
```

---

## 2. Install Dependencies

```bash
composer install
```

---

## 3. Configure Environment

Copy `.env.example` to `.env`

```bash
cp .env.example .env
```

Update database credentials inside `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=blog_system
DB_USERNAME=root
DB_PASSWORD=
```

---

## 4. Generate Application Key

```bash
php artisan key:generate
```

---

## 5. Run Migrations

```bash
php artisan migrate
```

---

## 6. Seed Database

```bash
php artisan db:seed
```

---

## 7. Create Storage Link

```bash
php artisan storage:link
```

---

## 8. Start Development Server

```bash
php artisan serve
```

Open:

```bash
http://127.0.0.1:8000
```

---

# Deployment

The application is deployed using:

* Render (Web Hosting)
* Railway (Cloud MySQL Database)
* Docker

Deployment includes:

* Dockerized Laravel setup
* Environment variable configuration
* Online database integration
* Production optimization
* File storage linking

---

# Project Highlights

* Full-stack Laravel application
* AJAX-powered dynamic updates
* Rich admin experience
* Clean modern white UI
* Fully responsive design
* Production deployment ready
* Optimized database structure
* Professional dashboard styling


