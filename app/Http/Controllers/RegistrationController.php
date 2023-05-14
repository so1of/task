<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegistrationController extends Controller
{
    public function registration(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|alpha|min:2|max:20',
            'surname' => 'required|string|alpha|min:3|max:36',
            'email' => 'required|string|email|unique:users,email',
            'password' => ['required' , 'string', Password::min(8)->letters()->numbers(), 'confirmed' , 'max:40']
        ],
        [
            'name.required' => 'Поле имя обязательно для заполнения',
            'name.alpha' => 'Имя должно содержать только буквы',
            'name.min' => 'Имя должно содержать не менее :min символов',
            'name.max' => 'Имя должно содержать не более :max символов',
            'surname.required' => 'Поле фамилия обязательно для заполнения',
            'surname.alpha' => 'Фамилия должна содержать только буквы',
            'surname.min' => 'Фамилия должна содержать не менее :min символов',
            'surname.max' => 'Фамилия должна содержать не более :max символов',
            'email.required' => 'Поле email обязательно для заполнения',
            'email.email' => 'Некорректный адрес email',
            'email.unique' => 'Пользователь с таким email уже зарегистрирован',
            'password.required' => 'Поле пароль обязательно для заполнения',
            'password.confirmation' => 'Пароли не совпадают',
            'password.min' => 'Пароль должен содержать не менее :min символов',
            'password.max' => 'Пароль должен содержать не более :max символов,',
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/task');
    }
}
