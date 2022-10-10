<?php

namespace App\Http\Controllers\Vendor\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Models\Vendor\Vendor;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:vendor', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('vendor.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('vendor')->attempt(['phone' => $request->phone, 'password' => $request->password], $request->remember))
        {
            if(Auth::guard('vendor')->user()->status)
            {
                return redirect()->route('vendor.dashboard');
            }
            else
            {
                Auth::guard('vendor')->logout();
                return redirect()->back()->withErrors(['not_verify' => [
                    'You are Not Verified!'
                ]]);
            }
        }
        return redirect()->back()->withInput($request->only('phone', 'remember'))
                ->withErrors(['password' => [
                    'These credentials don\'t match our records.',
                    'Or Incorrect Password'
                ]]);
    }

    /**
     *
     * @return type
     */
    public function logout() {
        Auth::guard('vendor')->logout();
        return redirect()->route('vendor.login');
    }
}
