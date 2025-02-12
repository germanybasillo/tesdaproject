<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Qualification extends Controller
{
    public function one()
    {
        return view('qualification.one');
    }
    
    public function two()
    {
        return view('qualification.two');
    }

    public function three()
    {
        return view('qualification.three');
    }

    public function four()
    {
        return view('qualification.four');
    }
}
