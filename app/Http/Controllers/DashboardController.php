<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    //
    public function dashboard_shift_medical()
    {
        return view('dashboard.shift_medical.shift_medical_dashboard');
    }
}
