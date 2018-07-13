<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
   protected $table = 'group';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['name','price','sort','weight'];
}
