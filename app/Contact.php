<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    
    public function client(){
        return $this->belongsTo('App\Client', 'id_client');
    }
}
