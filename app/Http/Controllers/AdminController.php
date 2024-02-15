<?php

namespace App\Http\Controllers;

use App\Models\Procedure;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $procedures = Procedure::limit(4)->orderBy('created_at', 'desc')->get();
        return view('admin.index', ['procedures' => $procedures]);
    }

    public function employees()
    {
        $user = User::where('id_role', 2)->with('procedure')->get();
        return view('admin.employees', ['employees' => $user]);
    }
}
