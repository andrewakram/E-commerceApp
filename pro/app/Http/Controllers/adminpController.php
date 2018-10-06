<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminpController extends Controller
{
    public function content()
    {
        return view('adminp.pages.parts.content');
    }
}
