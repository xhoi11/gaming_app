<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class ItemController extends Controller
{

    public function itemhistory()
    {
        return view('/pages/itemhistory');
    }

    public function rank()
    {
        return view('/pages/rank');
    }

}
