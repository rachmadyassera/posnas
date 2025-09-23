<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperNotesactivity
 */
class Notesactivity extends Model
{
    use HasFactory;

    public $table = 'notes_activitys';

    protected $fillable = [
        'id',
        'activity_id',
        'user_id',
        'notes',
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

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function documentation()
    {
        return $this->hasMany(Documentation::class);
    }
}
