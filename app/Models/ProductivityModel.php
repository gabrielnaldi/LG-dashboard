<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductivityModel extends Model {
    protected $table = 'productivities';
    protected $fillable = ['id', 'product', 'produced', 'defects', 'created_at'];
    protected $keyType = 'string';
    public $incrementing = false;
}