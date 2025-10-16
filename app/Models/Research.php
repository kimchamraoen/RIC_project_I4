<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Research extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'addresearch'; // match your table
    protected $fillable = ['user_id', 'publication_type', 'title', 'authors', 'day', 'month', 'year', 'file_path', 'published_at', 'description',
        'file_path2',];

    protected $casts = [
        'authors' => 'array',
        // 'published_at' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
