<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'notice';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['title','content','sort','ntime'];

}
