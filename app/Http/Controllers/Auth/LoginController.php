<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function LoginForm()
    {
        return view('auth.login');
    }

    public function Login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if ($request->ajax()) {
                return response()->json(['redirect' => route('home')]);
            }
            return redirect(route('home'));
        }
        if ($request->ajax()) {
            return response()->json(['message' => 'The email or password is incorrect.'], 401);
        }

        return back()->with('failed', 'The email or password is incorrect.');
        /*         return back()->withErrors([
                    'email' => "The Provided Credentials is incorrect"]); */

    }
}
