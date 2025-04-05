<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    use HasUuids;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'external_id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'person_id',
        'election_id',
        'number',
        'bio',
        'photo_url',
    ];

    /**
     * Get the person associated with the candidate.
     */
    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'person_id', 'external_id');
    }

    /**
     * Get the election that the candidate is participating in.
     */
    public function election(): BelongsTo
    {
        return $this->belongsTo(Election::class, 'election_id', 'external_id');
    }

    /**
     * Get the votes for the candidate.
     */
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class, 'candidate_id', 'external_id');
    }
}