<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model
{
    use HasFactory;    public $table = 'products';

    public $fillable = [
        'name',
        'description',
        'slug',
        'category_id',
        'price',
        'attributes'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'slug' => 'string',
        'category_id' => 'integer',
        'price' => 'integer'
    ];

    public static array $rules = [
        'name' => 'required',
        'price' => 'required'
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }
}
