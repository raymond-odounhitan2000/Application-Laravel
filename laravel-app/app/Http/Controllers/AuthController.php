<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $credentials = $request-> only('email','password');
        if(Auth::attempt($credentials))
        {
            return redirect(Route('home'));
        }
        return redirect(route('login'))->with('error','login failed');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate(
            [
                "username"=>"required|string|min:3|max:255|regex:/^[^\s]+$/",
                "email"=>"required|email|unique:users,email",
                "password"=>"required|min:8|max:16|confirmed",
            ]);
            $user = new User();
            $user->name= $request->username;
            $user->email= $request->email;
            $user->password=Hash::make($request->password);
            if($user->save())
                {
                    return redirect(Route('login'))->with('success'," User create successfully");
                };
            return redirect(Route('register'))->with('error','Failed to create account,please try again');
    }

    public function password_forget()
    {
        return view('auth.forgot-password');
    }

    public function password_forgetPost(Request $request)
    {
        // Valider l'adresse e-mail
        $request->validate(['email' => 'required|email']);
        // Envoyer le lien de réinitialisation de mot de passe
        $status = Password::sendResetLink($request->only('email'));
        // Vérifier le statut et rediriger en conséquence
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

  //Afficher le formulaire de réinitialisation du mot de passe.
    public function resetpassword(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }


    public function resetedPassword(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|max:16|confirmed',
        ]);
        // Réinitialiser le mot de passe
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );
        // Vérifier le statut et rediriger en conséquence
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function logout(Request $request): RedirectResponse
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}
}
