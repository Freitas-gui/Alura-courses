<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class myLoginController extends Controller
{
    public function index()
    {
        return view('myLogin.index');
    }

    public function login(Request $request)
    {
        if (!Auth::attempt ($request->only(['email','password']))) {
            return redirect()
                ->back()
                ->withErrors('You were unable to authenticate');
        }

        return redirect()->route('index');
    }
}
