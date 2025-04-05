<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Election extends Model
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
        'title',
        'description',
        'start_date',
        'end_date',
        'is_anonymous',
        'created_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_anonymous' => 'boolean',
    ];

    /**
     * Get the person who created the election.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'created_by', 'external_id');
    }

    /**
     * Get the candidates for the election.
     */
    public function candidates(): HasMany
    {
        return $this->hasMany(Candidate::class, 'election_id', 'external_id');
    }

    /**
     * Get the votes for the election.
     */
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class, 'election_id', 'external_id');
    }
}