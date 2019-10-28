<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
   
    protected $guarded = ['remember_token'];

  
    protected $hidden = [
        'password', 'remember_token',
    ];
}
