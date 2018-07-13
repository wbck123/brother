<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Newcategory extends Model
{

    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'news_category';

    protected $primaryKey = 'id';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    //主表
    protected $fillable = ['name'];

    public function list()
    {
        return $this->hasMany('APP\Models\Admin\Newcategory','sid');
    }


}
