<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Research extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'publication_type',
        'title',
        'authors',
        'published_at',
        'file_path',
    ];

    protected $casts = [
        'authors' => 'array',
        'published_at' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
