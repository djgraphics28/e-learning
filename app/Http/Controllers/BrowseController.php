<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Browse;

class BrowseController extends Controller
{
    public function index(Request $request) {
        $rp = DB::table('browses')
                ->select('title')
                ->orderBy('created_at')
                ->take(5)->get();

        if ($request->has('search')) {
            $data = [
                'rp' => DB::table('browses')->select('id', 'title')->orderBy('created_at', 'desc')->take(5)->get(),
                'items' => Browse::orderBy('created_at', 'desc')->where('title', 'like', '%'.$request->search.'%')->paginate(5)
            ];
        }
        else {
            $data = [
                'rp' => DB::table('browses')->select('id', 'title')->orderBy('created_at', 'desc')->take(5)->get(),
                'items' => Browse::orderBy('created_at', 'desc')->paginate(5)
            ];
        }

        return view('browse', ['data' => $data]);
    }

    public function view($id) {
        return view('browseView', ['data' => Browse::whereId($id)->first()]);
    }

    public function view_country($country) {
        $list = Browse::where('country', '=', $country)->orderBy('created_at', 'desc')->paginate(5);

        $data = [
            'list' => $list,
            'country' => $country
        ];

        return view('browseCountry', ['data' => $data]);
    }
}
