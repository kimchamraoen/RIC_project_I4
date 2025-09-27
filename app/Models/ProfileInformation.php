<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileInformation extends Model
{
    use HasFactory;

    // Explicitly set the table name to match your migration
    protected $table = 'profile_info';

    protected $fillable = [
        'user_id',
        'name', // Replaced first_name and last_name
        'institution',
        'location',
        'degree',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}