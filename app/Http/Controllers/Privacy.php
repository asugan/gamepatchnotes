<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Privacy extends Controller
{
    public function privacyfunction()
    {
        return view('site.privacy');
    }

    public function termsfunction()
    {
        return view('site.terms');
    }

    public function cookiefunction()
    {
        return view('site.cookie');
    }
}
