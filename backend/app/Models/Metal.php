<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metal extends Model
{
    use HasFactory;

    protected $table = 'metals';

    protected $fillable = [
        'name',
        'purity',
        'price_per_gram',
        'is_active',
    ];

    protected $casts = [
        'price_per_gram' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function scopeSearch($query, ?string $term)
    {
        return $term ? $query->where('name', 'like', "%{$term}%") : $query;
    }
}
