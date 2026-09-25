<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title', 'description', 'price', 'image_path'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query->when($filters['category_id'] ?? null, function ($q, $catId) {
            $q->where('category_id', $catId);
        });
    }

    public function getImageUrlAttribute(): string
    {
        if (!$this->image_path) {
            return 'https://picsum.photos/seed/placeholder/600/400';
        }

        if (Str::startsWith($this->image_path, ['http://', 'https://'])) {
            return $this->image_path;
        }

        return asset('storage/' . $this->image_path);
    }
}
