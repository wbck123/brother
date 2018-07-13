<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'nav';

    protected $primaryKey = 'id';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['title','pic','sort','link'];
}
