<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SqlexPrinter extends Model
{
    use HasFactory;

    public $table = 'sqlex_printer';

    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    const COLOR = ['y', 'n'];
    const TYPE = ['laser', 'jet', 'matrix'];

    public function sqlexProduct()
    {
        return $this->belongsTo(SqlexProduct::class, 'model', 'model');
    }
}
