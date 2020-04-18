<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table= 'comments'
    protected $primarykey= 'id'

    public $timestamps=false;

    protected $fillable =[
    	'comments',
    	'rating',
    	'emailPost'
    ];

    protected $guarded =[

    ];
}
