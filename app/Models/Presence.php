<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $table = 'presence';
    protected $fillable = [
        'id',
        'confrence_id',
        'name',
        'organization',
        'position',
        'id_employee',
        'gender',
        'nohp',
        'signature',
        'status'
    ];


    public function getIncrementing(){
        return false;
    }

    public function getKeyType(){
        return 'string';
    }

    public function confrence()
    {
        return $this->belongsTo(Confrence::class);
    }
}
