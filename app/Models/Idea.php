<?php

namespace App\Models;

use App\Enums\Priority;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Idea extends Model
{
    protected $fillable = ['title', 'description', 'status', 'category', 'priority', 'category_id'];

    protected $casts = [
        'status' => Status::class,
        'priority' => Priority::class
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
