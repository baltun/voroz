<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
class Json extends Model
{
    use HasFactory;

    public $table = 'table_json';

    public $fillable = [
        'json'
    ];

    protected $casts = [
        'json' => 'string'
    ];

    public static array $rules = [

    ];


}
