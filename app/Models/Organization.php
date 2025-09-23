<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperOrganization
 */
class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'address',
        'longitude',
        'latitude',
        'status',
    ];

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
