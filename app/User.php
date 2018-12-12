<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'active', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }
    
    private function checkIfUserHasRole($request)
    {
        return (strtolower($request) == strtolower($this->role->name)) ? true : null;
    }

    public function hasRole($roles){
        if(is_array($roles))
        {
            foreach($roles as $request)
            {
                if($this->checkIfUserHasRole($request))
                {
                    return true;
                }
            }
        }else{
            return $this->checkIfUserHasRole($roles);
        }
        return false;
    }

}
