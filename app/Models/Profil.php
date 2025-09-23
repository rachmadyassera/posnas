<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperProfil
 */
class Profil extends Model
{
    use HasFactory;

    public $table = 'profil_users';

    protected $fillable = [
        'id',
        'user_id',
        'organization_id',
        'nip',
        'jabatan',
        'nohp',
    ];

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
