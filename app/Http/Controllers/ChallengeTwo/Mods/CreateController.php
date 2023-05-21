<?php

declare(strict_types=1);

namespace App\Http\Controllers\ChallengeTwo\Mods;
use App\Http\Requests\CreateModRequest;
use App\Http\Resources\ModResource;
use App\Models\Mod;

final class CreateController
{

    /**
     * create a mod and related it to the given user
     *
     * @param Request $request
     * @return ModResource
     */
    public function create(CreateModRequest $request): ModResource
    {
        // Get the authenticated user's ID
        $userId = auth()->id();

        // Validation passed, create the mod
        $mod = Mod::create([
            'user_id' => $userId,
            'name' => $request->input('name'),
            'path' => $request->input('path'),
        ]);

        return new ModResource($mod);
    }


}
