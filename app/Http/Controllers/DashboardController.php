<?php

namespace App\Http\Controllers;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

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
        $userId = Auth::id();
    
        $reportes = Report::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('users.adminreport', compact('reportes'));
    }


}
