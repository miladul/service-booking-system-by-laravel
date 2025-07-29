# 🛠️ Service Booking API

A Laravel-based RESTful API for booking services. Supports registration, login, service listing, and bookings.

---

## 🚀 Requirements

- PHP ^8.2
- Composer
- Laravel Framework (compatible with PHP 8.2)
- MySQL or any other supported database

## 🚀 Features

- User Registration & Login (Laravel Passport)
- Service Management (CRUD)
- Booking System
- Role-based Access (Admin/User)
- API Resources & Service Pattern
- Postman Collection Provided
- Exception Handling with Custom JSON

---

## 📦 Installation

```bash
git clone https://github.com/miladul/service-booking-system-by-laravel.git
cd service-booking-system-by-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan passport:install
php artisan serve
```

Update `.env` with DB credentials.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=db_username
DB_PASSWORD=db_password

```

---

## 📬 API Endpoints

| Method | URI                         | Description                         | Auth | Role     |
|--------|-----------------------------|-------------------------------------|------|----------|
| POST   | /api/register               | Register new user                   | ❌   | Public   |
| POST   | /api/login                  | Login and get token                 | ❌   | Public   |
| GET    | /api/services               | List all services                   | ✅   | Customer |
| POST   | /api/bookings               | Create a new booking                | ✅   | Customer |
| GET    | /api/bookings               | Get logged-in user's bookings       | ✅   | Customer |
| POST   | /api/services               | Create new service                  | ✅   | Admin    |
| PUT    | /api/services/{service}     | Update existing service             | ✅   | Admin    |
| DELETE | /api/services/{service}     | Delete a service                    | ✅   | Admin    |
| GET    | /api/admin/bookings         | Get all bookings (admin only)       | ✅   | Admin    |

---

## 🔐 Auth Instructions

Use Bearer token in header after login:

```
Authorization: Bearer your_token_here
```

---

## 📤 Postman Collection
You can collect postman_collection.json
from this project

```
Path: 
public/open-api/postman_collection.json

```


1. Open Postman.
2. Click **Import** → Select `postman_collection.json`.
3. Use environment variable:
    - `base_url = http://localhost:8000/api`
    - `token = (paste token after login by customer user)`
    - `admin_token = (paste token after login by admin user)`

Example request with variables:

```http
POST {{base_url}}/register
{
  "name": "John",
  "email": "john@example.com",
  "password": "secret",
}
```

---

## ✅ API Response Example

```json
{
  "success": true,
  "message": "User logged in successfully",
  "data": {
    "token": "....",
    "user": { "id": 1, "name": "John", ... }
  }
}
```

---

## ❌ Error Response Example

```json
{
  "success": false,
  "message": "Validation failed",
  "errors": {
    "email": ["The email has already been taken."]
  }
}
```

---

## 🎨 Web View (Optional)

Minimal `welcome.blade.php` using **Bootstrap 5 (dark theme)** with a nice message. Intended as a static homepage only.

---

## 📄 License

MIT License © 2025 [Your Name]
