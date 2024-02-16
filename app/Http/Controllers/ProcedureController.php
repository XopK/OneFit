<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Procedure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcedureController extends Controller
{
    public function addProcedure()
    {
        $user = User::where('id_role', 2)->get();
        return view('admin.addProcedures', ['users' => $user]);
    }

    public function storeProcedure(Request $request)
    {
        $request->validate([
            'procedure_title' => 'required',
            'description' => 'required',
            'photo' => 'required|image',
            'employee' => 'required',
            'cost' => 'required|numeric'
        ], [
            'procedure_title.required' => 'Поле обязательно для заполнения!',
            'description.required' => 'Поле обязательно для заполнения!',
            'photo.required' => 'Поле обязательно для заполнения!',
            'employee.required' => 'Поле обязательно для заполнения!',
            'cost.required' => 'Поле обязательно для заполнения!',
            'photo.image' => 'Только изображения!',
            'cost.numeric' => 'Введите числовое значение!',
        ]);

        $name_procedure = $request->file('photo')->hashName();
        $path_procedure = $request->file('photo')->store('public/procedure');

        $procedure = Procedure::create([
            'title_procedure' => $request->procedure_title,
            'description' => $request->description,
            'photo_spa' => $name_procedure,
            'id_user' => $request->employee,
            'cost' => $request->cost,
        ]);

        if ($procedure) {
            return redirect()->back()->with('success', 'Процедура успешно добавлена!');
        } else {
            return redirect()->back()->with('error', 'Ошибка добавления!');
        }
    }

    public function index(){
        $procedure = Procedure::limit(4)->get();
        return view('index', ['procedures' => $procedure]);
    }

    public function infoProcedure(Procedure $id){
        return view('procedure', ['data' => $id]);
    }

    public function timeChoise(Procedure $id){
        return view('time', ['data' => $id]);
    }

    public function ApplicationCreate(Request $request){
        Application::create([
            'date' => $request['date'],
            'time'=> $request['time'],
            'id_procedure' => $request['id_procedure'],
            'id_user' => Auth::user()->id,
        ]);
        return redirect()->back()->with('success', 'Молодец!');
    }

    public function procedures(){
        $procedure = Procedure::all();
        return view('procedures', ['procedures' => $procedure]);
    }
}
