<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFightRequest;
use App\Http\Resources\FightResource;
use App\Models\Fight;
use Illuminate\Support\Facades\Auth;

class FightController extends Controller
{
    public function index()
    {
        $fights = Fight::where('host_id', Auth::id())
            ->orWhere('guest_id', Auth::id())
            ->get();

        return FightResource::collection($fights);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return FightResource
     */
    public function store(StoreFightRequest $request)
    {
        $fight = Fight::create([

            'host_id' => $request->input('host_id'),
            'guest_id' => $request->input('guest_id'),
            'invited_at' => date("Y-m-d H:i:s") ,
            'fought_at' => date("Y-m-d H:i:s"),

        ]);

        if ($fight) {
            return new FightResource($fight);
        }

        return response()->json(['message' => __('Something went wrong!')], 400);
    }
}
