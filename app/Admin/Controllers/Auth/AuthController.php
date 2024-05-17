<?php

namespace App\Admin\Controllers\Auth;

use App\Admin\Controllers\Controller;
use App\Admin\Services\Auth\AuthService;
use \Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Show the login page.
     *
     * @return Redirector|RedirectResponse|View|Factory
     */
    public function index()
    {
        if (AuthService::check()) {

            $prefix = config('admin.route.prefix');

            // redirect to root path
            return redirect('/' . $prefix);
        }

        return admin_view('auth/login');
    }

    /**
     * Handle a login request.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function login(Request $request)
    {

        $data = $request->all();

        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
        Validator::make($data, $rules)->validate();

        $credentials = $request->only(['username', 'password']);
        $remember = $request->get('remember', false);

        if (AuthService::attempt($credentials, $remember)) {
            return [
                'code' => 0, 
                'msg' => '', 
            ];
        }

        return [
            'code' => 1, 
            'msg' => trans('admin.username_or_password_invalid')
        ];
    }

    /**
     * Show the profile page.
     *
     * @return Redirector|RedirectResponse|View|Factory
     */
    public function profile()
    {
        if (AuthService::guest()) {

            $prefix = config('admin.route.prefix');

            // redirect to root path
            return redirect('/' . $prefix);
        }

        $user = AuthService::user();

        return admin_view('auth/profile', ['user' => $user]);
    }

    /**
     * User logout.
     *
     * @return mixed
     */
    public function logout(Request $request)
    {
        AuthService::logout();

        $request->session()->invalidate();

        return [
            'code' => 0, 
            'msg' => '', 
        ];
    }
}
