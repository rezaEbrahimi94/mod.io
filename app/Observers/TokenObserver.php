<?php

namespace App\Observers;

use App\Models\Token;
use App\Models\Log;
class TokenObserver
{
    /**
     * Handle the Token "created" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function created(Token $token)
    {
        $this->createLog($token, 'created');
    }

    /**
     * Handle the Token "updating" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function updating(Token $token)
    {
        if ($token->isDirty('revoked') && $token->revoked) {
            $this->createLog($token, 'deleted');
        }
    }


    /**
     * Create a log for the given token.
     *
     * @param  \App\Models\Token  $token
     * @param  string  $action
     * @return void
     */
    private function createLog(Token $token, string $action)
    {
        Log::create([
            'key' => $token->getKey(),
            'action' => $action,
        ]);
    }

}
