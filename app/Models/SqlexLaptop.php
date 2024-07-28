<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SqlexLaptop extends Model
{
    use HasFactory;

    public $table = 'sqlex_laptop';

    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    const SPEED = [450, 500, 600, 750, 800, 900];
    const RAM = [32, 64, 128];
    const CD = ['12x', '24x', '40x', '50x'];
    const SCREEN = [11, 12, 14, 15];

    public function sqlexProduct()
    {
        return $this->belongsTo(SqlexProduct::class, 'model', 'model');
    }
}
