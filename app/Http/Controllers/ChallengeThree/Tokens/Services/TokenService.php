<?php

namespace App\Http\Controllers\ChallengeThree\Tokens\Services;

use App\Http\Controllers\ChallengeThree\Tokens\Interfaces\TokenRepositoryInterface;
use App\Http\Controllers\ChallengeThree\Tokens\Interfaces\TokenServiceInterface;
use App\Models\User;

class TokenService implements TokenServiceInterface
{
    protected $tokenRepository;


    /**
     * Check if the given token is valid for the current user.
     *
     * @param string $token The token string to check.
     * @param User $user The user object for whom the token is being checked.
     * @return bool True if the token is valid for the user, false otherwise.
     */
    public function checkToken(string $token, User $user): bool
    {
        // Check if there is a matching token for the given key and it's not revoked
        return $user->tokens()->where('key', $token)->where('revoked', false)->exists();
    }
}
