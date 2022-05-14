<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Auth;
use DB;

use App\Teacher;
use App\User;

class AdminTeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index() {
        return view('admin.teacher.index');
    }

    public function table(Request $request) {
        if (!$request->ajax())
            return 'unauthorize';
        
        $data = Teacher::where('is_delete', '=', 0)->get();

        foreach ($data as $item) {
            $item->first_name = $item->first_name . ' ' . $item->middle_name . ' ' . $item->last_name;
            $item->date_birth = date('m/d/Y', strtotime($item->date_birth));
        }

        return $data;
    }

    public function bin() {
        if (Auth::user()->user_type != 1)
            return 'unauthorize';

        return view('admin.teacher.bin');
    }

    public function binTable(Request $request) {
        if (!$request->ajax())
            return 'unauthorize';
        
        $data = Teacher::where('is_delete', '=', 1)->get();

        foreach ($data as $item) {
            $item->first_name = $item->first_name . ' ' . $item->middle_name . ' ' . $item->last_name;
            $item->date_birth = date('m/d/Y', strtotime($item->date_birth));
        }

        return $data;
    }

    public function add() {
        if (Auth::user()->user_type != 1)
            return 'unauthorize';

        return view('admin.teacher.add');
    }

    public function addSave(Request $request) {
        $result = null;
        DB::transaction(function() use($request, &$result){
            $validator = Validator::make($request->all(), [
                'email' => ['required', 'unique:users,email']
            ]);

            if ($validator->passes()) {
                $teacher = Teacher::create([
                    'first_name' => $request->first_name,
                    'middle_name' => $request->middle_name,
                    'last_name' => $request->last_name,
                    'sex' => $request->sex,
                    'date_birth' => $request->date_birth,
                    'address' => $request->address,
                    'nationality' => $request->nationality,
                    'civil_status' => $request->civil_status,
                    'contact_no' => $request->contact_no
                ]);
    
                User::create([
                    'name' => $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name, 
                    'email' => $request->email, 
                    'password' => Hash::make($request->password), 
                    'user_type' => 2,
                    'user_id' => $teacher->id
                ]);
                
                $result = 'success';
            }
            else {
                $result = 'email_error';
            }
        });
        try {
            DB::commit();
            return $result;
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function update($id) {
        if (Auth::user()->user_type != 1)
            return 'unauthorize';
            
        $data = [
            'profile' => Teacher::find($id),
            'user' => User::where('user_id', '=', $id)->first()
        ];
        
        return view('admin.teacher.update', ['data' => $data]);
    }

    public function updateSave(Request $request) {
        $result = null;
        DB::transaction(function() use($request, &$result){
            $user = User::where('user_id', '=', $request->id)->first();

            if ($user->email == $request->email) {
                $teacher = Teacher::whereId($request->id)
                            ->update([
                                'first_name' => $request->first_name,
                                'middle_name' => $request->middle_name,
                                'last_name' => $request->last_name,
                                'sex' => $request->sex,
                                'date_birth' => $request->date_birth,
                                'address' => $request->address,
                                'nationality' => $request->nationality,
                                'civil_status' => $request->civil_status,
                                'contact_no' => $request->contact_no
                ]);
    
                if ($request->password != '') {
                    User::where('user_id', '=', $request->id)
                    ->where('user_type', '=', 2)
                    ->update([
                        'password' => Hash::make($request->password), 
                    ]);
                }
                User::where('user_id', '=', $request->id)
                    ->where('user_type', '=', 2)
                    ->update([
                        'name' => $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name, 
                    ]);
                
                $result = 'success';
            }
            else {
                $validator = Validator::make($request->all(), [
                    'email' => ['required', 'unique:users,email']
                ]);
    
                if ($validator->passes()) {
                    $teacher = Teacher::whereId($request->id)
                                ->update([
                                    'first_name' => $request->first_name,
                                    'middle_name' => $request->middle_name,
                                    'last_name' => $request->last_name,
                                    'sex' => $request->sex,
                                    'date_birth' => $request->date_birth,
                                    'address' => $request->address,
                                    'nationality' => $request->nationality,
                                    'civil_status' => $request->civil_status,
                                    'contact_no' => $request->contact_no
                    ]);
        
                    if ($request->password != '') {
                        User::where('user_id', '=', $request->id)
                        ->where('user_type', '=', 2)
                        ->update([
                            'password' => Hash::make($request->password), 
                        ]);
                    }
                    User::where('user_id', '=', $request->id)
                        ->where('user_type', '=', 2)
                        ->update([
                            'name' => $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name, 
                            'email' => $request->email, 
                        ]);
                    
                    $result = 'success';
                }
                else {
                    $result = 'email_error';
                }
            }
        });
        try {
            DB::commit();
            return $result;
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function remove($id) {
        try {
            Teacher::whereId($id)->update(['is_delete' => 1]);
            return 'success';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function restore($id) {
        try {
            Teacher::whereId($id)->update(['is_delete' => 0]);
            return 'success';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function profile() {
        if (Auth::user()->user_type != 2)
            return 'unauthorize';
            
        $data = [
            'profile' => Teacher::find(Auth::user()->user_id),
            'user' => User::where('id', '=', Auth::user()->id)->first()
        ];
        
        return view('admin.profile', ['data' => $data]);
    }
}