<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use App\Teacher;
use App\Student;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo() {
        $type = Auth::user()->user_type;

        switch ($type) {
            case '1':
                return '/admin/browse';
                break;
            case '2':
                return '/admin/browse';
            default:
                return '/';
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->user_type != 1) {
            $data = [];
            if ($user->user_type == 2)
                $data = Teacher::find($user->user_id);
            else if ($user->user_type == 3)
                $data = Student::find($user->user_id);

                if($data->civil_status == 'Inactive')
                auth()->logout();
                throw ValidationException::withMessages([
                    $this->username() => ['failed' => 'Your account is not active, please contact the system administrator.'],
                ]);

            if ($data->is_delete != 0) {
                auth()->logout();
                throw ValidationException::withMessages([
                    $this->username() => ['failed' => 'Your account is not active, please contact the system administrator.'],
                ]);
            }
        }
        return redirect()->intended($this->redirectPath());
    }
}
