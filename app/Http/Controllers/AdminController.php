<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Procedure;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $procedures = Procedure::limit(4)->orderBy('created_at', 'desc')->get();
        $application = Application::limit(5)->orderBy('created_at', 'desc')->where('id_status', 1)->get();
        $formattedApplications = $application->map(function ($application) {
            $application->formatted_datetime = Carbon::parse($application->created_at)->format('j F l H:i');
            return $application;
        });
        dd($application);
        return view('admin.index', ['procedures' => $procedures, 'applications' => $application]);
    }

    public function employees()
    {
        $user = User::where('id_role', 2)->with('procedure')->get();
        return view('admin.employees', ['employees' => $user]);
    }

    public function adminprocedures()
    {
        $procedures = Procedure::orderBy('created_at', 'desc')->get();
        return view('admin.procedures', ['procedures' => $procedures]);
    }
}
