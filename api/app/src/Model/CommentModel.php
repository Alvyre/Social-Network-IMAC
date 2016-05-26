<?php

namespace App\Model;

use \Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{

    protected $table = 'comment';

    public $timestamps = false;

    protected $fillable = array('dateComment', 'contentComment');

}

?>