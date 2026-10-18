<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiamondCut extends Model
{
    use HasFactory;

    protected $table = 'diamond_cuts';

    protected $fillable = [
        'name',
        'grade',
        'description',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function scopeSearch($query, ?string $term)
    {
        return $term ? $query->where('name', 'like', "%{$term}%") : $query;
    }
}
