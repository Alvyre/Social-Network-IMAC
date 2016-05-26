<?php

namespace App\Model;

use \Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{

    protected $table = 'user';

    public $timestamps = false;

	protected $fillable = array('pseudoUser', 'statusUser', 'photoUser','emailUser', 'sexUser', 'bioUser', 'passUser');

    public function comment()
    {
        return $this->HasMany('App\Model\CommentModel', 'idUser', 'idUser');
    }

    public function subject()
    {
        return $this->hasMany('App\Model\CommentModel','idSubject','idSubject');
    }

}

?>