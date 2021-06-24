<?php

namespace Zay;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductSpecification extends Model
{
    use SoftDeletes;
    protected $table = 'product_specification';
    public $timestamps=false;
}
