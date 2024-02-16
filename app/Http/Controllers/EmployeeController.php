<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function list(){
        $data = Procedure::where('id_user', Auth::user()->id)->paginate(4);
        return view('employee.procedures', ['data' => $data]);
    }

    public function listApp($id){
        $data = Application::where('id_procedure', $id)->paginate(5);
        return view('employee.applications', ['data' => $data]);
    }

    public function accept(Application $id){
        $id->id_status = 2;
        $id->save();
        return redirect()->back();
    }

    public function decline(Application $id){
        $id->id_status = 3;
        $id->save();
        return redirect()->back();
    }
}
