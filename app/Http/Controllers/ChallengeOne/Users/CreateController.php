<?php

declare(strict_types=1);

namespace App\Http\Controllers\ChallengeOne\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Hash;

final class CreateController extends Controller
{

    /**
     * create a user
     *
     * @param Request $request
     * @return UserResource
     */
    public function create(CreateUserRequest $request):UserResource
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return new UserResource($user);
    }
}
