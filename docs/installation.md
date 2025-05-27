# Installation Guide

### 1. Install the Package

```bash
composer require nigus-abate/laravel-permify
// Generate basic scaffolding...
php artisan permify bootstrap
php artisan permify tailwind
php artisan permify vue
php artisan permify react

npm install & npm run dev

// Generate login / registration scaffolding...
php artisan permify:auth bootstrap
php artisan permify:auth tailwind
php artisan permify:auth vue
php artisan permify:auth react
php artisan migrate


$user->assignRole('admin');
$user->givePermissionTo('edit_post');

if ($user->hasPermission('edit_post')) {
    // show edit interface
}