<?php

namespace App\Model;

use \Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{

    protected $table = 'comment';

    public $timestamps = false;

    protected $fillable = array('dateComment', 'contentComment');

    public function user()
    {
        return $this->belongsTo('App\Model\UserModel','idUser','idUser');
    }

    public function subject()
    {
        return $this->belongsTo('App\Model\SubjectModel','idSubject','idSubject');
    }


}

?>