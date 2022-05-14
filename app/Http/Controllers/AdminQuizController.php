<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Auth;
use DB;

use App\Quiz;
use App\QuizHistory;
use App\User;

class AdminQuizController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index() {
        return view('admin.quiz.index');
    }

    public function table(Request $request) {
        if (!$request->ajax())
            return 'unauthorize';
        
        if (Auth::user()->user_type == 1) {
            $data = DB::table('quizzes')
                ->selectRaw('id, title, created_at')
                ->orderBy('created_at', 'desc')
                ->get();
        }
        else {
            $data = DB::table('quizzes')
                ->selectRaw('id, title, created_at')
                ->orderBy('created_at', 'desc')
                ->where('created_by', '=', Auth::user()->id)
                ->get();
        }

        foreach ($data as $item) {
            $item->hasHistory = QuizHistory::where('quiz_id', '=', $item->id)->count();
            $item->created_at = date('m/d/Y', strtotime($item->created_at));
        }

        return $data;
    }

    public function add() {
        $data = User::join('teachers', 'teachers.id', 'users.user_id')
                    ->where('users.user_type', '=', 2)
                    ->where('teachers.is_delete', '=', 0)
                    ->get();

        return view('admin.quiz.add', ['data' => $data]);
    }

    public function addSave(Request $request) {
        DB::transaction(function() use($request){
            if (Auth::user()->user_type == 1) {
                Quiz::create([
                    'title' => $request->title,
                    '1_question' => $request['1_question'],
                    '1_answerA' => $request['1_answerA'],
                    '1_answerB' => $request['1_answerB'],
                    '1_answerC' => $request['1_answerC'],
                    '1_answerD' => $request['1_answerD'],
                    '1_correctAnswer' => $request['1_correctAnswer'],
                    '2_question' => $request['2_question'],
                    '2_answerA' => $request['2_answerA'],
                    '2_answerB' => $request['2_answerB'],
                    '2_answerC' => $request['2_answerC'],
                    '2_answerD' => $request['2_answerD'],
                    '2_correctAnswer' => $request['2_correctAnswer'],
                    '3_question' => $request['3_question'],
                    '3_answerA' => $request['3_answerA'],
                    '3_answerB' => $request['3_answerB'],
                    '3_answerC' => $request['3_answerC'],
                    '3_answerD' => $request['3_answerD'],
                    '3_correctAnswer' => $request['3_correctAnswer'],
                    '4_question' => $request['4_question'],
                    '4_answerA' => $request['4_answerA'],
                    '4_answerB' => $request['4_answerB'],
                    '4_answerC' => $request['4_answerC'],
                    '4_answerD' => $request['4_answerD'],
                    '4_correctAnswer' => $request['4_correctAnswer'],
                    '5_question' => $request['5_question'],
                    '5_answerA' => $request['5_answerA'],
                    '5_answerB' => $request['5_answerB'],
                    '5_answerC' => $request['5_answerC'],
                    '5_answerD' => $request['5_answerD'],
                    '5_correctAnswer' => $request['5_correctAnswer'],
                    'created_by' => $request->posted_by
                ]);
            }
            else {
                Quiz::create([
                    'title' => $request->title,
                    '1_question' => $request['1_question'],
                    '1_answerA' => $request['1_answerA'],
                    '1_answerB' => $request['1_answerB'],
                    '1_answerC' => $request['1_answerC'],
                    '1_answerD' => $request['1_answerD'],
                    '1_correctAnswer' => $request['1_correctAnswer'],
                    '2_question' => $request['2_question'],
                    '2_answerA' => $request['2_answerA'],
                    '2_answerB' => $request['2_answerB'],
                    '2_answerC' => $request['2_answerC'],
                    '2_answerD' => $request['2_answerD'],
                    '2_correctAnswer' => $request['2_correctAnswer'],
                    '3_question' => $request['3_question'],
                    '3_answerA' => $request['3_answerA'],
                    '3_answerB' => $request['3_answerB'],
                    '3_answerC' => $request['3_answerC'],
                    '3_answerD' => $request['3_answerD'],
                    '3_correctAnswer' => $request['3_correctAnswer'],
                    '4_question' => $request['4_question'],
                    '4_answerA' => $request['4_answerA'],
                    '4_answerB' => $request['4_answerB'],
                    '4_answerC' => $request['4_answerC'],
                    '4_answerD' => $request['4_answerD'],
                    '4_correctAnswer' => $request['4_correctAnswer'],
                    '5_question' => $request['5_question'],
                    '5_answerA' => $request['5_answerA'],
                    '5_answerB' => $request['5_answerB'],
                    '5_answerC' => $request['5_answerC'],
                    '5_answerD' => $request['5_answerD'],
                    '5_correctAnswer' => $request['5_correctAnswer'],
                    'created_by' => Auth::user()->id
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

    public function view($id) {
        $data = [
            'quiz' => Quiz::find($id),
            'user' => User::where('id', '!=', 1)->get()
        ];

        return view('admin.quiz.view', ['data' => $data]);
    }

    public function update($id) {
        $data = [
            'quiz' => Quiz::find($id),
            'user' => User::where('id', '!=', 1)->get()
        ];

        return view('admin.quiz.update', ['data' => $data]);
    }


    public function updateSave(Request $request) {
        DB::transaction(function() use($request){
            if (Auth::user()->user_type == 1) {
                Quiz::whereId($request->id)
                ->update([
                    'title' => $request->title,
                    '1_question' => $request['1_question'],
                    '1_answerA' => $request['1_answerA'],
                    '1_answerB' => $request['1_answerB'],
                    '1_answerC' => $request['1_answerC'],
                    '1_answerD' => $request['1_answerD'],
                    '1_correctAnswer' => $request['1_correctAnswer'],
                    '2_question' => $request['2_question'],
                    '2_answerA' => $request['2_answerA'],
                    '2_answerB' => $request['2_answerB'],
                    '2_answerC' => $request['2_answerC'],
                    '2_answerD' => $request['2_answerD'],
                    '2_correctAnswer' => $request['2_correctAnswer'],
                    '3_question' => $request['3_question'],
                    '3_answerA' => $request['3_answerA'],
                    '3_answerB' => $request['3_answerB'],
                    '3_answerC' => $request['3_answerC'],
                    '3_answerD' => $request['3_answerD'],
                    '3_correctAnswer' => $request['3_correctAnswer'],
                    '4_question' => $request['4_question'],
                    '4_answerA' => $request['4_answerA'],
                    '4_answerB' => $request['4_answerB'],
                    '4_answerC' => $request['4_answerC'],
                    '4_answerD' => $request['4_answerD'],
                    '4_correctAnswer' => $request['4_correctAnswer'],
                    '5_question' => $request['5_question'],
                    '5_answerA' => $request['5_answerA'],
                    '5_answerB' => $request['5_answerB'],
                    '5_answerC' => $request['5_answerC'],
                    '5_answerD' => $request['5_answerD'],
                    '5_correctAnswer' => $request['5_correctAnswer'],
                    'created_by' => $request->posted_by
                ]);
            }
            else {
                Quiz::whereId($request->id)
                ->update([
                    'title' => $request->title,
                    '1_question' => $request['1_question'],
                    '1_answerA' => $request['1_answerA'],
                    '1_answerB' => $request['1_answerB'],
                    '1_answerC' => $request['1_answerC'],
                    '1_answerD' => $request['1_answerD'],
                    '1_correctAnswer' => $request['1_correctAnswer'],
                    '2_question' => $request['2_question'],
                    '2_answerA' => $request['2_answerA'],
                    '2_answerB' => $request['2_answerB'],
                    '2_answerC' => $request['2_answerC'],
                    '2_answerD' => $request['2_answerD'],
                    '2_correctAnswer' => $request['2_correctAnswer'],
                    '3_question' => $request['3_question'],
                    '3_answerA' => $request['3_answerA'],
                    '3_answerB' => $request['3_answerB'],
                    '3_answerC' => $request['3_answerC'],
                    '3_answerD' => $request['3_answerD'],
                    '3_correctAnswer' => $request['3_correctAnswer'],
                    '4_question' => $request['4_question'],
                    '4_answerA' => $request['4_answerA'],
                    '4_answerB' => $request['4_answerB'],
                    '4_answerC' => $request['4_answerC'],
                    '4_answerD' => $request['4_answerD'],
                    '4_correctAnswer' => $request['4_correctAnswer'],
                    '5_question' => $request['5_question'],
                    '5_answerA' => $request['5_answerA'],
                    '5_answerB' => $request['5_answerB'],
                    '5_answerC' => $request['5_answerC'],
                    '5_answerD' => $request['5_answerD'],
                    '5_correctAnswer' => $request['5_correctAnswer']
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
            Quiz::whereId($id)->delete();
            return 'success';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function logs($id) {
        return view('admin.quiz.logs', ['id' => $id]);
    }

    public function logsTable($id) {
        $data = DB::table('quiz_histories as qh')
                ->selectRaw('users.name, qh.score, qh.created_at')
                ->join('users', 'users.id', 'qh.student_id')
                ->where('quiz_id', '=', $id)
                ->orderBy('qh.id', 'desc')
                ->get();    

        foreach($data as $item) {
            $item->score = $item->score . '/5';
            $item->created_at = date('m/d/Y h:i A', strtotime($item->created_at));
        }

        return $data;
    }
    
}