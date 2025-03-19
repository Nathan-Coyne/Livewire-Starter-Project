<?php
namespace App\Traits;

use App\Models\Platform;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use App\Models\Permission;

trait HasPlatformPermissions
{
    public function permissions()
    {
        return $this->morphToMany(Permission::class, 'grantee', 'entity_entity_permissions', 'grantee_id', 'permission_id')
            ->where('grantee_type', self::class);
    }

    public function platformPermissions()
    {
        return $this->morphToMany(Permission::class, 'grantee', 'entity_entity_permissions', 'grantee_id', 'permission_id')
            ->where('grantee_type', self::class)->where('granter_type', Platform::class);
    }

    public function grantedPermissions()
    {
        return $this->morphToMany(Permission::class, 'granter', 'entity_entity_permissions', 'granter_id', 'permission_id')
            ->where('granter_type', self::class);
    }

    public function hasPermission(Permission $permission)
    {
        return $this->permissions->contains($permission);
    }

    public function hasPlatformPermission(Permission $permission)
    {
        return $this->platformPermissions->contains($permission);
    }
}
