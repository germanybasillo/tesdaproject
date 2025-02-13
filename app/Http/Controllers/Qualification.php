<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class Qualification extends Controller
{
    public function one()
    {
        if (!$this->isAccessAllowed()) {
            return $this->denyAccess();
        }
        return view('qualification.one');
    }

    public function two()
    {
        if (!$this->isAccessAllowed()) {
            return $this->denyAccess();
        }
        return view('qualification.two');
    }

    public function three()
    {
        if (!$this->isAccessAllowed()) {
            return $this->denyAccess();
        }
        return view('qualification.three');
    }

    public function four()
    {
        if (!$this->isAccessAllowed()) {
            return $this->denyAccess();
        }
        return view('qualification.four');
    }

    private function isAccessAllowed()
    {
        $now = Carbon::now('Asia/Manila');
        $start = Carbon::today('Asia/Manila')->setTime(0, 0);
        // $end = Carbon::today('Asia/Manila')->setTime(12, 0);

        $end = Carbon::today('Asia/Manila')->setTime(23, 59); // Extend access until 11:59 PM


        // return $now->isMonday() && $now->between($start, $end);
        
        return $now->isThursday() && $now->between($start, $end);

    }

    private function denyAccess()
    {
        return redirect()->back()->with('error', 'Access is only allowed on Mondays from 12:00 AM to 12:00 PM (Asia/Manila).');
    }
    
}
