<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    
    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }
    
    public function contact(){
        return $this->hasMany('App\Contact');
    }
}
