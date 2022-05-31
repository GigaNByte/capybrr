<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UserMatchesController extends Controller
{

    public function index(): View
    {
        $user = auth()->user();

        return view('user.matches', [
            'user' => $user
        ]);
    }

}
