<?php

namespace App\Http\Controllers;

use DB;

use App\Quiz;
use App\User;

use App\QuizHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'student']);
    }

    public function index() {
        /* $quiz = Quiz::orderBy('created_at', 'desc')->get();
        $info = QuizHistory::where('student_id', '=', Auth::user()->id)->orderBy('id', 'desc')->first();

        $data = [
            'quiz' => $quiz,
            'info' => $info
        ]; */

        $data = Quiz::orderBy('created_at', 'desc')->get();
        foreach($data as $item) {
            $score = QuizHistory::select('score')->where('quiz_id', '=', $item->id)->where('student_id', '=', Auth::user()->id)->orderBy('id', 'desc')->first();
            $item->score = $score['score'];
        }

        return view('quiz', ['data' => $data]);
    }

    public function getData($id) {
        return Quiz::find($id);
    }

    public function take($id) {
        if (QuizHistory::where('quiz_id', '=', $id)->where('student_id', '=', Auth::user()->id)->count() > 0)
            return 'unauthorized';

        return view('quizTake', ['data' => $this->getData($id)]);
    }

    public function takeSubmit(Request $request) {
        $score = 0;
        $status1 = '<label><span class="text-success"><i class="fa fa-check"></i> Correct!</span></label>';
        $status2 = '<label><span class="text-success"><i class="fa fa-check"></i> Correct!</span></label>';
        $status3 = '<label><span class="text-success"><i class="fa fa-check"></i> Correct!</span></label>';
        $status4 = '<label><span class="text-success"><i class="fa fa-check"></i> Correct!</span></label>';
        $status5 = '<label><span class="text-success"><i class="fa fa-check"></i> Correct!</span></label>';

        $quizData = $this->getData($request->id);

        if ($request['1_answer'] == $quizData['1_correctAnswer'])
            $score ++;
        else
            $status1 = '<label><span class="text-danger"><i class="fa fa-times"></i> Wrong! </span><span class="text-muted"> The correct answer is '.$quizData['1_correctAnswer'].'</span></label>';
        if ($request['2_answer'] == $quizData['2_correctAnswer'])
            $score ++;
        else
            $status2 = '<label><span class="text-danger"><i class="fa fa-times"></i> Wrong! </span><span class="text-muted"> The correct answer is '.$quizData['2_correctAnswer'].'</span></label>';
        if ($request['3_answer'] == $quizData['3_correctAnswer'])
            $score ++;
        else
            $status3 = '<label><span class="text-danger"><i class="fa fa-times"></i> Wrong! </span><span class="text-muted"> The correct answer is '.$quizData['3_correctAnswer'].'</span></label>';
        if ($request['4_answer'] == $quizData['4_correctAnswer'])
            $score ++;
        else
            $status4 = '<label><span class="text-danger"><i class="fa fa-times"></i> Wrong! </span><span class="text-muted"> The correct answer is '.$quizData['4_correctAnswer'].'</span></label>';
        if ($request['5_answer'] == $quizData['5_correctAnswer'])
            $score ++;
        else
            $status5 = '<label><span class="text-danger"><i class="fa fa-times"></i> Wrong! </span><span class="text-muted"> The correct answer is '.$quizData['5_correctAnswer'].'</span></label>';


        $data = [
            'status' => 'success',
            'score' => $score,
            'status1' => $status1,
            'status2' => $status2,
            'status3' => $status3,
            'status4' => $status4,
            'status5' => $status5
        ];

        QuizHistory::create([
            'student_id' => Auth::user()->id,
            'quiz_id' => $request->id,
            'score' => $score
        ]);

        return $data;
    }
}
