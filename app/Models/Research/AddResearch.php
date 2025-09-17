<?php

namespace App\Models\Research;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Research\AddResearch;

class AddResearch extends Model
{
    use HasFactory;

    protected $table = 'add_research';
    protected $fillable = [
        'publication_type',
        'file_path',
        'title',
        'authors',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];

}
