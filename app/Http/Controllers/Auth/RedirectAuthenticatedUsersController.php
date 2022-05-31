<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RedirectAuthenticatedUsersController extends Controller
{
    public function index()
    {


        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }
        elseif(auth()->user()->role == 'user'){
            return redirect()->route('user.dashboard');
        }
        else{
            return auth()->logout();
        }
    }
}
