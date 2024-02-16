<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function list(){
        $data = Procedure::where('id_user', Auth::user()->id)->get();
        return view('employee.procedures', ['data' => $data]);
    }

    public function listApp($id){
        $data = Application::where('id_procedure', $id)->get();
        return view('employee.applications', ['data' => $data]);
    }
}
