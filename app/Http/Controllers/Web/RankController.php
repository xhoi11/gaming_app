<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class RankController extends Controller
{

    public function rank()
    {
        return view('/pages/rank');
    }

}
