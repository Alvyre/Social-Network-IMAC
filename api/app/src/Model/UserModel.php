<?php

namespace App\Model;

use \Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{

    protected $table = 'user';

    public $timestamps = false;

	protected $fillable = array('pseudoUser', 'statusUser', 'photoUser','emailUser', 'sexUser', 'bioUser', 'passUser');

}

?>