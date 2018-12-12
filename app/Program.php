<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';
    protected $fillable = ['program', 'description'];
    protected $primarykey = 'id';
    public $timestamps = false;

}
