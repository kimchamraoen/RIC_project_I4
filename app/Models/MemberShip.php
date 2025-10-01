<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MemberShip extends Model
{
    use HasFactory;

    protected $table = 'memberships';

    protected $fillable = [
        'user_id',
        'member',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
