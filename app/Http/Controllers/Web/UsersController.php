<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function users()
    {
        return view('/pages/users');
    }

}
