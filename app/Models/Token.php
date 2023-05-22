<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Token extends Model
{
    protected $fillable = ['key', 'user_id', 'revoked'];
    protected $casts = [
        'revoked' => 'boolean',
    ];
    /**
     * Get the user that owns the token.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the token's ID.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    /**
     * Get the token's key.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->getAttribute('key');
    }

    /**
     * Determine if the token is revoked.
     *
     * @return bool
     */
    public function getRevoked(): bool
    {
        return $this->getAttribute('revoked');
    }

    /**
     * Get the token's creation date and time.
     *
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->getAttribute('created_at');
    }
}
