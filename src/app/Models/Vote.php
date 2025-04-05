<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends Model
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
        'election_id',
        'voter_id',
        'candidate_id',
        'is_anonymous',
        'was_validated',
        'hash',
        'timestamp',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_anonymous' => 'boolean',
        'was_validated' => 'boolean',
        'timestamp' => 'datetime',
    ];

    /**
     * Get the election associated with the vote.
     */
    public function election(): BelongsTo
    {
        return $this->belongsTo(Election::class, 'election_id', 'external_id');
    }

    /**
     * Get the voter who cast the vote.
     */
    public function voter(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'voter_id', 'external_id');
    }

    /**
     * Get the candidate that received the vote.
     */
    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'external_id');
    }
}