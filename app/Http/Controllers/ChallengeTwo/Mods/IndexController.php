<?php

declare(strict_types=1);

namespace App\Http\Controllers\ChallengeTwo\Mods;

use App\Http\Controllers\Controller;
use App\Http\Resources\ModResource;
use App\Models\Mod;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class IndexController extends Controller
{

    /**
     * return a collection of mods
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $mods = Mod::with('user')->simplePaginate();

        return ModResource::collection($mods);
    }


}
