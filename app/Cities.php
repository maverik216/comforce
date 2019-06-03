<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    //
    protected $fillable = ['name'];
    public function state()
    {
        return $this->belongsTo('App\States','state_id');
    }
}
