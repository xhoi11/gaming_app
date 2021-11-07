<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\HeroResource;
use App\Http\Resources\KindResource;
use App\Models\Hero;
use App\Models\Kind;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KindController extends Controller
{
    public function index()
    {
        return KindResource::collection(Kind::all());
    }
}
