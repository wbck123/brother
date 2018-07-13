<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
        protected $table = 'banks';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['name','price','bpic','rate','ency','per','burl','sort','num','desc'];
}
