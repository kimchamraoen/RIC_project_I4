<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Missing_detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'institute',
        'department',
        'position',
        'primary_affiliation_month',
        'primary_affiliation_year',
        'country_region',
        'city',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
