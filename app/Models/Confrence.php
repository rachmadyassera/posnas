<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperConfrence
 */
class Confrence extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'organization_id',
        'location_id',
        'title',
        'description',
        'date_confrence',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // public function participant()
    // {
    //     return $this->hasMany(Participant::class);
    // }
}
