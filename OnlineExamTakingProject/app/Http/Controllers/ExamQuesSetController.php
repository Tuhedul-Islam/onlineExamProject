<?php

namespace App\Http\Controllers;

use App\ExamQuesSet;
use App\QuesSet;
use App\Question;
use App\Subject;
use App\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExamQuesSetController extends Controller
{
    public function index(){
        $subject = Subject::where('status', 1)->get();
        return view('admin.examQuesSet.index', compact('subject'));
    }

    public function create($subject_id){
        $examTitle  = Title::where('status', 1)->get();
        $quesSet    = QuesSet::where('status', 1)->get();
        $subject    = Subject::where('id', $subject_id)->where('status', 1)->first();
        $question   = Question::where('subject_id', $subject_id)->where('status', 1)->get();

        return view('admin.examQuesSet.createQues', compact('subject', 'question', 'quesSet', 'examTitle'));
    }

    public function store(Request $request){

        if (!empty($request->selectedQues)){
            if (count($request->selectedQues) !=10){
                Session::flash('error', 'Please Select 10 Question.');
                return \redirect()->back();
            }else{
                $exam_ques_set = ExamQuesSet::where('title_id', $request->title)->where('semester_id', $request->semester)
                                ->where('set_id', $request->set)->where('subject_id', $request->subject)->first();

                if(empty($exam_ques_set)){
                    $create_ques = new ExamQuesSet();
                    $create_ques->title_id = $request->title;
                    $create_ques->semester_id = $request->semester;
                    $create_ques->set_id = $request->set;
                    $create_ques->subject_id = $request->subject;
                    $create_ques->ques_ids = empty($request->selectedQues)? null: implode(',', $request->selectedQues);
                    $create_ques->save();

                    Session::flash('success', 'Exam Question Created Successfully');
                    return \redirect('create/examQuestionSet');
                }else{
                    Session::flash('error', 'Exam Question Already Exist');
                    return \redirect()->back();
                }
            }
        }
        else{
            Session::flash('error', 'Please Select 10 Question.');
            return \redirect()->back();
        }

    }


    public function viewQues(){
        $subject = Subject::where('status', 1)->get();
        return view('admin.examQuesSet.view', compact('subject'));
    }

    public function subjectWiseQuesSet($subject_id){
        $subject = Subject::where('status', 1)->where('id', $subject_id)->first();
        $selectedSubjectAllQues = ExamQuesSet::where('subject_id', $subject_id)->get();
        //dd($subjectWiseAllQues);

        return view('admin.examQuesSet.viewSubjectWiseQuesSet', compact('selectedSubjectAllQues', 'subject'));
    }

    public function changeStatus($ques_id, $status_id){
        $status = $status_id==1? 2: 1;

        $ques = ExamQuesSet::where('id', $ques_id)->first();
        $ques->status = $status;

        if ($ques->save()){
            Session::flash('success', 'Status Changed Successfully');
            return \redirect()->back();
        }else{
            Session::flash('error', 'Status Not Changed Successfully');
            return \redirect()->back();
        }


    }

}
