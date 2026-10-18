<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bracelet extends Model
{
    use HasFactory;

    protected $table = 'bracelets';

    protected $fillable = [
        'name',
        'sku',
        'length_cm',
        'price',
    ];

    protected $casts = [
        'length_cm' => 'decimal:2',
        'price' => 'decimal:2',
    ];

    public function scopeSearch($query, ?string $term)
    {
        return $term ? $query->where('name', 'like', "%{$term}%") : $query;
    }
}
