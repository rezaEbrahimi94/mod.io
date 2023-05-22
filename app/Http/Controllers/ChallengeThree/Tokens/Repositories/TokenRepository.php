<?php

namespace App\Http\Controllers\ChallengeThree\Tokens\Repositories;

use App\Http\Controllers\ChallengeThree\Tokens\Interfaces\TokenRepositoryInterface;
use App\Models\Token;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;

class TokenRepository implements TokenRepositoryInterface
{
    /**
     * Issue a new token for the specified user.
     *
     * @param User $user The user for whom the token is being issued.
     * @return Token The newly issued token.
     */
    public function issueToken(User $user): Token
    {
        $token = new Token();
        $token->key = Str::uuid()->toString();
        $token->user_id = $user->id;
        $token->revoked = false; 
        $token->save();
        return $token;
    }

    /**
     * Revoke a token by setting the 'revoked' field to true.
     *
     * @param string $token The token to be revoked.
     * @return bool True if the token was revoked successfully, false otherwise.
     */
    public function revokeToken(string $token): bool
    {
        $tokenModel = Token::where('key', $token)->first();

        if ($tokenModel) {
            $tokenModel->update(['revoked' => true]);
            return true;
        }

        return false;
    }

}
