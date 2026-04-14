#!/bin/bash
set -e

echo "--- LINKPREE Automated Installer ---"

# Install Frontend
cd frontend
if [ -f package.json ]; then
  echo "Installing frontend dependencies..."
  npm install
fi

# Install Backend
cd ../backend
if [ -f composer.json ]; then
  echo "Installing backend dependencies..."
  composer install
fi

# Setup Backend Env
cp -n .env.example .env || true

# Migrate & Seed Database
php artisan migrate --seed

# Start Backend
php artisan serve &

# Start Frontend
cd ../frontend
npm run build
npm run dev &

# Mobile App
cd ../mobile
if [ -f pubspec.yaml ]; then
  echo "Mobile: run 'flutter pub get' then 'flutter run' manually (requires emulator/device)"
fi

echo "--- LINKPREE installation complete! ---"
