<?php

namespace App\Model;

//use Illuminate\Database\Capsule\Manager as DB;
use \Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{

    protected $table = 'subject';

    public $timestamps = false;

    protected $fillable = array('titleSubject', 'contentSubject', 'dateSubject');

    /*public function dball()
    {
        return $this;
    }*/

    public function cat()
    {
        return $this->belongsTo('App\Model\CategoryModel','idCat','idCat');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\UserModel','idUser','idUser');
    }

    public function comment()
    {
        return $this
        	->HasMany('App\Model\CommentModel', 'idSubject', 'idSubject')
            ->raw(
                'SELECT * FROM subject, (SELECT idSubject, COUNT(idSubject) as nbCom from comment group by idSubject) AS tempTable 
                WHERE subject.idSubject = tempTable.idSubject
                ORDER BY tempTable.nbCom DESC'
            );
    }
}

?>