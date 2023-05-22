<?php

declare(strict_types=1);

namespace App\Http\Controllers\ChallengeThree\Tokens;

use App\Http\Controllers\ChallengeThree\Tokens\Interfaces\TokenRepositoryInterface;
use App\Http\Controllers\ChallengeThree\Tokens\Interfaces\TokenServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\TokenResource;
use Illuminate\Http\Request;

final class CreateController extends Controller
{
    protected $tokenRepository;
    protected $tokenService;

    public function __construct(TokenRepositoryInterface $tokenRepository, TokenServiceInterface $tokenService)
    {
        $this->tokenRepository = $tokenRepository;
        $this->tokenService = $tokenService;
    }
    
     /**
     * create a token and related it to the given user
     *
     * @param TokenRepositoryInterface $repository
     * @return TokenResource
     */
    public function create(Request $request): TokenResource
    {
        $user = $request->user();
        $token = $this->tokenRepository->issueToken($user);
        return new TokenResource($token);
    }
}