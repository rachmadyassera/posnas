<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'organization_id',
        'name',
        'address',
        'description',
        'status'
    ];

    protected $table = 'locations';

    public function getIncrementing(){
        return false;
    }

    public function getKeyType(){
        return 'string';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function confrence()
    // {
    //     return $this->hasMany(Confrence::class);
    // }
}
