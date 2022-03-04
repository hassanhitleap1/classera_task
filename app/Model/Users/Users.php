<?php


namespace App\Model\Users;



use App\Scopes\Users\UserScope;
use App\User;

class Users extends  User
{
    protected $table = 'users';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new UserScope());
     
    }

}
