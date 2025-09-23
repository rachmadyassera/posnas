<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperHistoryactivity
 */
class Historyactivity extends Model
{
    use HasFactory;

    public $table = 'history_log_activitys';

    protected $fillable = [
        'id',
        'activity_id',
        'log',
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

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
