<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AuthController extends Controller
{
    /**
     * The function responsible to return the view of the login form
     *
     * @return Application|Factory|View
     */
    public function showLoginForm ()
    {
        return view('auth.login');
    }
    public function showRegisterForm ()
    {
        return view('auth.register');
    }

    public function dashboard ()
    {
        return view('auth.dashboard');
    }
    public function account ()
    {
        return view('account');
    }
}
