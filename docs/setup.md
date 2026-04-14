# LINKPREE Setup Guide

## Requirements
- Node.js >= 18.x
- Flutter >= 3.10
- PHP >= 8.1, Composer
- SQLite or MySQL database

## Installation Steps

### 1. Clone the repository
```sh
git clone https://github.com/sabba24/openhands-linkpere.git
cd openhands-linkpere
```

### 2. Install Frontend Dependencies
```sh
cd frontend
npm install
```

### 3. Install Backend Dependencies
```sh
cd ../backend
composer install
```

### 4. Set Up Environment
Copy `.env.example` to `.env` in both `/frontend` and `/backend`. Configure your database and API endpoints.

### 5. Run Backend Migrations & Seeders
```sh
php artisan migrate --seed
```

### 6. Start Backend (Laravel)
```sh
php artisan serve
```

### 7. Start Frontend (Vite)
```sh
cd ../frontend
npm run dev
```

### 8. Set Up & Run Mobile App
```sh
cd ../mobile
flutter pub get
flutter run # or flutter build apk (Android)
```


## Notes
- See `docs/api.md` for API endpoints.
- Demo/test accounts: see `docs/demo-accounts.md`.
