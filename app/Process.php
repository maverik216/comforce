<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    //
    protected $fillable = ['description', 'city_id', 'process_id'];
    public function city()
    {
        return $this->belongsTo('App\Cities','city_id');
    }
    public function status()
    {
        return $this->belongsTo('App\Status','status_id');
    }
}
