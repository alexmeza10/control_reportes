<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.menu');
    }

    public function adminuser()
    {

        return view('profile.profile');
    }

    public function newreport()
    {
        return view('report.newreport');
    }

    public function adminreport()
    {
        return view('report.adminreport');
    }


}
