#!/bin/bash
set -e

php artisan migrate:fresh --seed
ADMIN_EMAIL=admin_$(date +%s)@demo.local
ADMIN_PASS=$(openssl rand -hex 8)
USER_EMAIL=user_$(date +%s)@demo.local
USER_PASS=$(openssl rand -hex 8)

php artisan tinker --execute="App\\Models\\User::create([ 'name'=>'Super Admin', 'email'=>'$ADMIN_EMAIL', 'password'=>bcrypt('$ADMIN_PASS'), 'role'=>'admin']);"
php artisan tinker --execute="App\\Models\\User::create([ 'name'=>'Test User', 'email'=>'$USER_EMAIL', 'password'=>bcrypt('$USER_PASS'), 'role'=>'user']);"

echo "---------"
echo "ADMIN ACCOUNT: $ADMIN_EMAIL : $ADMIN_PASS"
echo "TEST USER: $USER_EMAIL : $USER_PASS"
echo "---------"
