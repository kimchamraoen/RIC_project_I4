<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Affiliation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'affiliations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'institution',
        'location',
        'degree',
        'department',
        'newImage',
    ];

    /**
     * Get the user that owns the profile information.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
