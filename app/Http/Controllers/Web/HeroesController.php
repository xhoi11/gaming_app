<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class HeroesController extends Controller
{
    public function create()
    {
        return view('heroes.create');
    }

}
