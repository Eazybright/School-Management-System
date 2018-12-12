<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name'];
    protected $primaryKey =  'id';
    public $timestamps = false;

    public function users()
    {
        return $this->hasmany('App\User', 'role_id', 'id');
    }
}
