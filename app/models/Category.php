<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    public $timestamps=false;

    //liên kết 1 - nhiều với bảng product
    public function product()
    {
        return $this->hasMany('App\models\Product', 'category_id', 'id');
    }

}
