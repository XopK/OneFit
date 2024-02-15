<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    protected function generatePassword($length = 8)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }

    public function addEmployee(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required|regex:/\+7\([0-9][0-9][0-9]\)[0-9]{3}(\-)[0-9]{2}(\-)[0-9]{2}$/|unique:users',
            'email' => 'required|email|unique:users',
        ], [
            'name.required' => 'Поле обязательно для заполнения!',
            'surname.required' => 'Поле обязательно для заполнения!',
            'phone.required' => 'Поле обязательно для заполнения!',
            'email.required' => 'Поле обязательно для заполнения!',
            'phone.regex' => 'Введите требуемый формат!',
            'phone.unique' => 'Данный номер занят!',
            'email.email' => 'Введите корректные данные!',
            'email.unique' => 'Данная почта занята!',
        ]);

        $password = $this->generatePassword();

        $employee = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'id_role' => 2,
            'email' => $request->email,
            'password' => Hash::make($password),
        ]);

        if ($employee) {
            $to = $request->email;
            $subejct = "Добро пожаловать в команду!";
            $txt = "
            Вы стали сотрудником 'OneFit'! 
            Данные для входа
            Номер телефона: $request->phone;
            Пароль: $password;
            ";
            mail($to, $subejct, $txt);
            return redirect()->back()->with('success', 'Сотрудник создан!');
        } else {
            return redirect()->back()->with('error', 'Ошибка создания!');
        }
    }
}
