---

## 📄 5. `docs/examples.md`

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
