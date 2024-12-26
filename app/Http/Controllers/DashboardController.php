<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    //
    /*
     * Controller access permission resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:dashboard_shift_medical|sysadmin|admin']);
    }

    public function dashboard_shift_medical()
    {
        return view('dashboard.shift_medical.shift_medical_dashboard');
    }
}
