<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'award_type',
        'title',
        'month_start_date',
        'year_start_date',
        'month_end_date',
        'year_end_date',
        'currency',
        'amount',
        'funding_agency',
        'grant_reference',
        'principal_investigators',
        'co_investigators',
        'institution',
        'secondary_institutions',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
