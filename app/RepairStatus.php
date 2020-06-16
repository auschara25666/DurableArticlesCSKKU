<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RepairStatus extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'repair_id', 'status', 'user', 'admin', 'comment', 'equipment'
    ];
    public function repair()
    {
        return $this->belongsTo('App/Repair', 'repair_id');
    }
    public function user()
    {
        return $this->belongsTo('App/User', 'user');
    }
    public function admin()
    {
        return $this->belongsTo('App/User', 'admin');
    }
    public function equipment()
    {
        return $this->belongsTo('App/Equipment', 'equipment');
    }
}
