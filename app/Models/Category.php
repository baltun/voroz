<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
class Category extends Model
{
    use HasFactory;    public $table = 'categories';

    public $fillable = [
        'name',
        'description',
        'parent_id'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'parent_id' => 'integer'
    ];

    public static array $rules = [
        'name' => 'required'
    ];

    
}
