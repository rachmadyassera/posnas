<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * @mixin IdeHelperPermission
 */
class Permission extends SpatiePermission
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'uuid';
}
