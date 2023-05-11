<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'student_id' => ['required', 'string', 'max:255', 'unique:users,studentID'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'name' => ['required', 'string', 'max:255'],
            'password_confirmation' => ['required', 'same:password'],
            'contact' => ['min:10']
        ], [
            'student_id.required' => '学籍番号を入力してください。',
            'student_id.unique' => '学籍番号がは既に存在します。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.unique' => 'メールアドレスは既に存在します',
            'password.required' => 'パスワードを入力してください。',
            'password_confirmation.required' => 'パスワード確認を入力してください。',
            'password_confirmmation.same' => 'パスワード確認はパスワードと一致する必要があります',
            'name.required' => '名前を入力してください。',
            'contact' => '不正の電話番号です。'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 0,
            'studentID' => $request->student_id,
            'telnum' => $request->contact,
            'class' => $request->class

        ]);
        Log::info($user);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
