<?php

namespace App\Model;

use \Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{

    protected $table = 'category';

    public $timestamps = false;

    protected $fillable = array('titleCat');

}

?>