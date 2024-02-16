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
            $application->formatted_datetime = Carbon::parse($application->created_at)->isoFormat('D MMMM dddd HH:mm');
            return $application;
        });

        return view('admin.index', ['procedures' => $procedures, 'applications' => $application]);
    }

    public function employees(Request $request)
    {
        $sort = $request->input('sort', null);

        $usersQuery = User::where('id_role', 2)->with('procedure');

        if ($sort !== null) {
            $usersQuery->orderBy('name', $sort);
        }

        $users = $usersQuery->get();
        return view('admin.employees', ['employees' => $users]);
    }

    public function application(Request $request)
    {
        $status = $request->input('status', null);

        if ($status !== null) {
            $applications = $this->filterApplication($status);
        } else {
            $applications = Application::orderBy('created_at', 'desc')->get();
            $formattedApplications = $applications->map(function ($application) {
                $application->formatted_datetime = Carbon::parse($application->created_at)->isoFormat('D MMMM dddd HH:mm');
                return $application;
            });
        }
        return view('admin.applications', ['applications' => $applications]);
    }

    protected function filterApplication($status)
    {
        $application = Application::where('id_status', $status)->orderBy('created_at', 'desc')->get();
        $formattedApplications = $application->map(function ($application) {
            $application->formatted_datetime = Carbon::parse($application->created_at)->isoFormat('D MMMM dddd HH:mm');
            return $application;
        });
        return $formattedApplications;
    }

    public function adminprocedures()
    {
        $procedures = Procedure::orderBy('created_at', 'desc')->get();
        return view('admin.procedures', ['procedures' => $procedures]);
    }

    public function deleteUser(User $id)
    {
        $id->delete();
        return redirect()->back()->with('success', 'Сотрудник удален!');
    }
}
