<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model
{
    use HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'people';

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
        'name',
        'email',
        'document_id',
        'role',
    ];

    /**
     * Get the credential associated with the person.
     */
    public function credential(): HasOne
    {
        return $this->hasOne(Credential::class, 'person_id', 'external_id');
    }

    /**
     * Get the elections created by the person.
     */
    public function createdElections(): HasMany
    {
        return $this->hasMany(Election::class, 'created_by', 'external_id');
    }

    /**
     * Get the candidate profiles associated with the person.
     */
    public function candidateProfiles(): HasMany
    {
        return $this->hasMany(Candidate::class, 'person_id', 'external_id');
    }

    /**
     * Get the votes cast by the person.
     */
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class, 'voter_id', 'external_id');
    }

    /**
     * Get the audit logs created by the person.
     */
    public function auditLogs(): HasMany
    {
        return $this->hasMany(AuditLog::class, 'actor_id', 'external_id');
    }
}