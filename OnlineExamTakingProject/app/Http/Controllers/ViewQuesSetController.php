<?php

namespace App\Http\Controllers;

use App\ExamQuesSet;
use Illuminate\Http\Request;

class ViewQuesSetController extends Controller
{
    public function index($exam_ques_set_id){

        $question_set = ExamQuesSet::where('id', $exam_ques_set_id)->where('status', 1)->first();
        return view('view-question-paper', compact('question_set'));
    }


    public function studentAnswerPaper(Request $request){
        echo "Thanks You. <br> Your Result Will Be Published Soon.";

    }


    public function countView(){
        return view('timeCount');
    }
}
