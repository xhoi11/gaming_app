<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHeroRequest;
use App\Http\Resources\FightResource;
use App\Http\Resources\HeroResource;
use App\Http\Resources\KindResource;
use App\Models\Fight;
use App\Models\Hero;
use App\Models\Kind;
use Illuminate\Support\Facades\Auth;

class HeroController extends Controller
{
    public function index()
    {

        $heroes = Hero::where('user_id', Auth::id())->get();

        return HeroResource::collection($heroes);

    }

      /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return HeroResource
       */
    public function store(StoreHeroRequest $request)
    {
        $hero = Hero::create($request->validated());

        if ($hero) {

            return new HeroResource($hero);
        }

        return response()->json(['message' => __('Something went wrong!')], 400);
    }
}
