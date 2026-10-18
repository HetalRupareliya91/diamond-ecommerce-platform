<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earring extends Model
{
    use HasFactory;

    protected $table = 'earrings';

    protected $fillable = [
        'name',
        'sku',
        'style',
        'price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function scopeSearch($query, ?string $term)
    {
        return $term ? $query->where('name', 'like', "%{$term}%") : $query;
    }
}
