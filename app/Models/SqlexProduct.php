<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SqlexProduct extends Model
{
    use HasFactory;

    public $table = 'sqlex_product';

//    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    const CD = ['PC', 'Laptop', 'Printer'];

    public function pcs()
    {

    }
}
