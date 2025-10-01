<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EditorRole extends Model
{
    use HasFactory;

    // protected $table = 'editor_roles';

    protected $fillable = [
        'user_id',
        'role',
        'journal',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
