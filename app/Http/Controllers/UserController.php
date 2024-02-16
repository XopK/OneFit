<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Procedure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required|regex:/\+7\([0-9][0-9][0-9]\)[0-9]{3}(\-)[0-9]{2}(\-)[0-9]{2}$/|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'conf_password' => 'required|same:password',
        ], [
            'name.required' => 'Поле обязательно для заполнения!',
            'surname.required' => 'Поле обязательно для заполнения!',
            'phone.required' => 'Поле обязательно для заполнения!',
            'email.required' => 'Поле обязательно для заполнения!',
            'phone.regex' => 'Введите требуемый формат!',
            'phone.unique' => 'Данный номер занят!',
            'email.email' => 'Введите корректные данные!',
            'email.unique' => 'Данная почта занята!',
            'password.required' => 'Поле обязательно для заполенения!',
            'conf_password.required' => 'Поле обязательно для заполенения!',
            'password.min' => 'Минимум 8 символов!',
            'conf_password.same' => 'Пароли не совпадают',
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'id_role' => 3,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            Auth::login($user);
            return redirect('/')->with('success', 'Успешаная регистраиця!');
        } else {
            return redirect()->back()->with('error', 'Ошибка регистрации!');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect("/");
    }

    public function signIn(Request $request)
    {
        $request->validate([
            'phone' => 'required|regex:/\+7\([0-9][0-9][0-9]\)[0-9]{3}(\-)[0-9]{2}(\-)[0-9]{2}$/',
            'password' => 'required',
        ], [
            'phone.required' => 'Поле обязательно для заполнения!',
            'phone.regex' => 'Введите требуемый формат!',
            'password.required' => 'Поле обязательно для заполнения!',
        ]);

        if (
            Auth::attempt([
                'phone' => $request->phone,
                'password' => $request->password,
            ])
        ) {
            if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2) {
                return redirect('/admin')->with('success', 'Успешная авторизаиця!');
            } else {
                return redirect('/')->with('success', 'Успешная авторизация!');
            }
        } else {
            return redirect()->back()->with('error', 'Ошибка авторизации!');
        }
    }
    public function editUser(Request $request){
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required|regex:/\+7\([0-9][0-9][0-9]\)[0-9]{3}(\-)[0-9]{2}(\-)[0-9]{2}$/|unique:users,phone,' . Auth::user()->id,
            'password' => 'nullable|min:8',
        ], [
            'name.required' => 'Поле обязательно для заполнения!',
            'surname.required' => 'Поле обязательно для заполнения!',
            'phone.required' => 'Поле обязательно для заполнения!',
            'email.required' => 'Поле обязательно для заполнения!',
            'phone.regex' => 'Введите требуемый формат!',
            'phone.unique' => 'Данный номер занят!',
            'password.min' => 'Минимум 8 символов!',
        ]);
        $updateInfo = User::find(Auth::user()->id);
        if (!empty($request['password'])) {
            $updateInfo->password = Hash::make($request['password']);
        }
        $updateInfo->name = $request['name'];
        $updateInfo->surname = $request['surname'];
        $updateInfo->phone = $request['phone'];
        $updateInfo->save();

        return redirect()->back()->with('success', 'Данные обновлены');
    }

    public function profile(){
        $data = Application::where('id_user', Auth::user()->id)->paginate(5);
        return view('profile', ['data' => $data]);
    }
}
