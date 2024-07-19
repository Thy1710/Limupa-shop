<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

class DashboardController
{
    public function view_dashboard(){
        return view('backend.dashboard');
    }
}
