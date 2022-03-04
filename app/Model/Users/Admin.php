<?php


namespace App\Model\Users;


use App\Scopes\Users\AdminScope;
use App\Scopes\Users\Filters;
use App\User;

class Admin extends  User
{
    protected $table = 'users';

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new AdminScope());
      
    }



}
