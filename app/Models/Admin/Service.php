<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['title','content'];
}
