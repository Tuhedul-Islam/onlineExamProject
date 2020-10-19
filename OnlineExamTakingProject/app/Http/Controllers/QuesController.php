<?php

namespace App\Http\Controllers;

use App\Question;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class QuesController extends Controller
{
    public function quesIndex(){
        $allQuestion = Question::where('status', 1)->get();
        return view('admin.Question.index', compact('allQuestion'));
    }

    public function addQues(){
        $allSubject = Subject::where('status', 1)->get();
        return view('admin.Question.addQues', compact('allSubject'));
    }


    public function quesStore (Request $request){
//        dd($request->all());

        $validatedData = Validator::make($request->all(), [
            'subject_id' => 'required',
            'question_name' => 'required',
            'status' => 'required',
        ]);

        if ($validatedData->fails()) {
            return redirect('add/question')->withErrors($validatedData->errors())->withInput();
        }else{
            if (!empty($request->subject_id) && !empty($request->question_name)){
                $set = new Question();
                $set->subject_id = $request->subject_id;
                $set->ques_name = $request->question_name;
                $set->option1 = $request->option1;
                $set->option2 = $request->option2;
                $set->option3 = $request->option3;
                $set->option4 = $request->option4;
                $set->option5 = $request->option5;
                $set->answer = $request->answer;
                $set->status = $request->status;
                $set->save();

                Session::flash('success', 'Data Created Successfully');
                return \redirect('Ques/index');
            }else{
                Session::flash('error', 'Data can not be Created');
                return \redirect()->back();
            }
        }
    }


    public function quesDelete($ques_id){
        $set = Question::find($ques_id);

        if ($set->delete()){

            Session::flash('success', 'Data Deleted Successfully');
            return \redirect('Ques/index');
        }else{
            Session::flash('error', 'Data can not be Deleted');
            return \redirect()->back();
        }
    }




}
