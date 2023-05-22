<?php

declare(strict_types=1);

namespace App\Http\Controllers\ChallengeThree\Tokens;

use App\Http\Controllers\ChallengeThree\Tokens\Interfaces\TokenRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\TokenDeleteRequest;
use Illuminate\Http\Response;
use App\Models\Log;

final class DeleteController extends Controller
{

    /**
     * Delete a given token and return a response.
     *
     * @param TokenRepositoryInterface $repository
     * @param TokenDeleteRequest $request
     * @return Response
     */
    public function delete(TokenRepositoryInterface $repository, TokenDeleteRequest $request): Response
    {
        $token = $request->input('token');
        $deleted = $repository->revokeToken($token);
        return response('', 204);
    
    }

}
