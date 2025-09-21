<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    public $table = 'activitys';


    protected $fillable = [
        'id',
        'user_id',
        'organization_id',
        'date_activity',
        'name_activity',
        'location',
        'description',
        'accompanying_officer',
        'status_activity',
        'status'
    ];

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

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function notesactivity()
    {
        return $this->hasMany(Notesactivity::class);
    }

    public function historyactivity()
    {
        return $this->hasMany(Historyactivity::class);
    }

}
