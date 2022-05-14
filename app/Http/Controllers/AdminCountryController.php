<?php

namespace App\Http\Controllers;

use App\User;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminCountryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index() {
        return view('admin.country.index');
    }

    public function table(Request $request) {
        if (!$request->ajax())
            return 'unauthorize';

        // if (Auth::user()->user_type == 1) {
        $data = DB::table('countries')
            ->selectRaw('id, image, country_name, country_capital, description, created_at')
            ->orderBy('created_at', 'desc')
            ->get();
        // }
        // else {
        //     $data = DB::table('countries')
        //         ->selectRaw('id, image, country_name, country_capital, description, created_at')
        //         ->orderBy('created_at', 'desc')
        //         ->where('created_by', '=', Auth::user()->id)
        //         ->get();
        // }

        foreach ($data as $item) {
            $item->created_at = date('m/d/Y', strtotime($item->created_at));
        }

        return $data;
    }

    public function add() {
        // $data = User::join('teachers', 'teachers.id', 'users.user_id')
        //             ->where('users.user_type', '=', 2)
        //             ->where('teachers.is_delete', '=', 0)
        //             ->get();


        return view('admin.country.add');
    }

    public function addSave(Request $request) {
        DB::transaction(function() use($request){
            $image = 'browse.jpg';
            if ($request->hasFile('image')) {
                $full_file = $request->file('image')->getClientOriginalName();
                $name_file = pathinfo($full_file, PATHINFO_FILENAME);
                $ext_file = $request->file('image')->getClientOriginalExtension();
                $file_name = $name_file.'_'.time().'_.'.$ext_file;
                $path = $request->file('image')->storeAs('public/browse/', $file_name);
                $image = $file_name;
            }

            // $other_images = [];
            // if ($request->hasFile('other_images')) {
            //     foreach($request->file('other_images') as $file) {
            //         $full_file = $file->getClientOriginalName();
            //         $name_file = pathinfo($full_file, PATHINFO_FILENAME);
            //         $ext_file = $file->getClientOriginalExtension();
            //         $file_name = $name_file.'_'.time().'_.'.$ext_file;
            //         $path = $file->storeAs('public/browse/', $file_name);
            //         $other_images[] = $file_name;
            //     }
            // }

            if (Auth::user()->user_type == 1) {
                Country::create([
                    'image' => $image,
                    // 'other_images' => json_encode($other_images),
                    // 'video' => $request->video,
                    'country_name' => $request->country_name,
                    'country_capital' => $request->country_capital,
                    'description' => $request->description,
                    // 'created_by' => $request->posted_by
                ]);
            }
            // else {
            //     Country::create([
            //         'image' => $image,
            //         'other_images' => json_encode($other_images),
            //         'video' => $request->video,
            //         'country' => $request->country,
            //         'title' => $request->title,
            //         'context' => $request->context,
            //         'created_by' => Auth::user()->id
            //     ]);
            // }
        });
        try {
            DB::commit();
            return 'success';
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function update($id) {
        $data = [
            'country' => Country::find($id),
            'user' => User::where('id', '!=', 1)->get()
        ];

        return view('admin.browse.update', ['data' => $data]);
    }

    public function updateSave(Request $request) {
        DB::transaction(function() use($request){
            $data = Country::find($request->id);

            $image = $data->image;
            if ($request->hasFile('image')) {
                $full_file = $request->file('image')->getClientOriginalName();
                $name_file = pathinfo($full_file, PATHINFO_FILENAME);
                $ext_file = $request->file('image')->getClientOriginalExtension();
                $file_name = $name_file.'_'.time().'_.'.$ext_file;
                $path = $request->file('image')->storeAs('public/browse/', $file_name);
                $image = $file_name;
            }

            if ($request->hasFile('other_images')) {
                $other_images = [];
                foreach($request->file('other_images') as $file) {
                    $full_file = $file->getClientOriginalName();
                    $name_file = pathinfo($full_file, PATHINFO_FILENAME);
                    $ext_file = $file->getClientOriginalExtension();
                    $file_name = $name_file.'_'.time().'_.'.$ext_file;
                    $path = $file->storeAs('public/browse/', $file_name);
                    $other_images[] = $file_name;
                }

                Country::whereId($request->id)
                ->update([
                    'image' => $image,
                    'other_images' => json_encode($other_images),
                    'video' => $request->video,
                    'country' => $request->country,
                    'title' => $request->title,
                    'context' => $request->context
                ]);
            }
            else {
                Country::whereId($request->id)
                ->update([
                    'image' => $image,
                    'video' => $request->video,
                    'country' => $request->country,
                    'title' => $request->title,
                    'context' => $request->context
                ]);
            }

            if (Auth::user()->user_type == 1) {
                Country::whereId($request->id)
                ->update([
                    'created_by' => $request->posted_by,
                ]);
            }
        });
        try {
            DB::commit();
            return 'success';
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function remove($id) {
        try {
            Country::whereId($id)->delete();
            return 'success';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
