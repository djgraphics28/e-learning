<?php

namespace App\Http\Middleware;

use Closure;
use App\Student;
use Illuminate\Support\Facades\Auth;

class Student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if (Auth::user()->user_type == 3) {

        //     $active = Student::where('id',Auth::user()->user_id)->get();

        //     if($active == 'Active'){
        //         return $next($request);
        //     }else{
        //         return redirect('/');
        //     }

        // }
        // else {
        //     return redirect('/');
        // }
        // return redirect('admin/browse');
    }
}
