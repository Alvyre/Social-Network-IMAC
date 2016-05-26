<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HomeModel extends Model
{
	protected $table = 'subject';

    public $timestamps = false;

 public function sub()
    {
        return $this
        	->belongsTo('App\Model\SubjectModel', 'idCat', 'idCat')
    }


}

?>