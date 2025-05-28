# Installation Guide

### 1. Install the Package
---

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
```

### 2. Guide

---

```md
# Developer Guide

## Blade Directives

```blade
@can('edit_post')
    <button>Edit</button>
@endcan
```
### 3. Example

---

```md
# Usage Examples

## Assign Role and Permission

```php
$user->assignRole('editor');
$user->givePermissionTo('delete_post');

@can('delete_post')
    <button>Delete</button>
@endcan
---
