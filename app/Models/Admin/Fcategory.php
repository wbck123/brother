<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Fcategory extends Model
{
    protected $table = 'fcategory';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['name','sort','range'];
}
