<?php

namespace Zay;

use Illuminate\Database\Eloquent\Model;

class RatingSubscribe extends Model
{
    //
    protected $table="rating_subscribe";
    public $timestamps=false;
    protected $fillable = ['rating'];
}
