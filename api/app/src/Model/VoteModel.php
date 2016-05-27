<?php

namespace App\Model;

use \Illuminate\Database\Eloquent\Model;

class VoteModel extends Model
{

    protected $table = 'vote';

    public $timestamps = false;

    protected $fillable = array('upVote', 'downVote');

    public function user()
	{
        return $this->belongsTo('App\Model\UserModel','idUser', 'idUser');
    }
    public function subject()
    {
        return $this->belongsTo('App\Model\SubjectModel','idSubject','idSubject');
    }

}

?>