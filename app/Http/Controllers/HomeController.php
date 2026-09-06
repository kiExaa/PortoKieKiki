<?php

namespace App\Http\Controllers;

use App\Models\Profile;

class HomeController
{
    public function index()
    {
        $profile = Profile::first();

        return view('public.home', compact('profile'));
    }
}
