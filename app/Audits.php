<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audits extends Model
{
    //
    protected $fillable = ['user_id', 'action'];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
