<?php

namespace App\Model;

use \Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{

    protected $table = 'subject';

    public $timestamps = false;

    protected $fillable = array('titleSubject', 'contentSubject', 'dateSubject');


}

?>