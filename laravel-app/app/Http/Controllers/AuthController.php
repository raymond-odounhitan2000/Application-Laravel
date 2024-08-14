<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
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
        return redirect(route('login.post'))->with('error','login failed');
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

    public function forgetPassword()
    {
        return view('forgot-password');
    }

    public function forgetPasswordPost(Request $request)
    {
        // Valider l'adresse e-mail
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token=Str::random(64);
        DB::table('password_resets')->insert(
            [
                'email'=>$request->email,
                "token"=>$token,
                'created_at'=> Carbon::now()
            ]);
            Mail::send('emails.forget-password',['token'=>$token],function($message) use ($request)
            {
                $message->to($request->email);
                $message->subject("Reset Password");
            });
            return redirect()->to(route('forget.password'))->with('success',"We have send an email to reset password");
    }

  //Afficher le formulaire de réinitialisation du mot de passe.
    public function resetPassword(string $token)
    {
        return view('new-password',compact('token'));
    }


    public function resetPasswordPost(Request $request)
    {
        // Valider les données du formulaire
        $request->validate(
        [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8|max:16|confirmed',
            'password_confirmation'=>'required'
        ]);
        // Réinitialiser le mot de passe
        $updatePassword=DB::table('password_resets')->where(
            [
                'email'=>$request->email,
                'token' => $request->token,
            ])->first();
            if(!$updatePassword)
            {
                return redirect()->to(route('reset.password'))->with('error',"Invalid");
            }
            User::where('email',$request->email)->update(['password'=>Hash::make($request->password)]);
            DB::table('password_resets')->where(['email'=>$request->email])->delete();
            return redirect()->to(route('login'))->with('success','Your password has been changed');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success','Successful disconnection');
    }
}
