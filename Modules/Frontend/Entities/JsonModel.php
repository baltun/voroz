<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JsonModel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'json'];

    protected $table = 'table_json';

    protected static function newFactory()
    {
        return \Modules\Frontend\Database\factories\JsonModelFactory::new();
    }
}
