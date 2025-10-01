<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Short_introduction extends Model
{
    protected $table = 'short_introduction';

    protected $fillable = [
        'user_id',
        'introduction',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
