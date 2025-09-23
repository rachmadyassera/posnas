<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperDocumentation
 */
class Documentation extends Model
{
    use HasFactory;

    public $table = 'documentation_activitys';

    protected $fillable = [
        'id',
        'notesactivity_id',
        'user_id',
        'picture',
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

    public function notesactivity()
    {
        return $this->belongsTo(Notesactivity::class);
    }
}
