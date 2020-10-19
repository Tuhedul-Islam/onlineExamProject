<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubjectController extends Controller
{
    public function subjectIndex(){
        $allSubject = Subject::where('status', 1)->get();
        return view('admin.subject.index', compact('allSubject'));
    }

    public function addSubject(){
        return view('admin.subject.addSubject');
    }

    public function subjectStore(Request $request){
//        dd($request->all());

        if (!empty($request->subject_name)){
            $subject = new Subject();
            $subject->subject_name = $request->subject_name;
            $subject->status = $request->status;
            $subject->save();

            Session::flash('success', 'Data Created Successfully');
            return \redirect('add/subject');
        }else{
            Session::flash('error', 'Data can not be Created');
            return \redirect()->back();
        }

    }

    public function subjectEdit($subject_id){
        $subjectInfo = Subject::where('id', $subject_id)->first();
        return view('admin.subject.editSubject', compact('subjectInfo'));
    }

    public function subjectUpdate(Request $request, $subject_id){
        $subject = Subject::find($subject_id);

        if (!empty($subject)){
            $subject->subject_name = $request->subject_name;
            $subject->status = $request->status;
            $subject->save();

            Session::flash('success', 'Data Updated Successfully');
            return \redirect('subject/index');
        }else{
            Session::flash('error', 'Data can not be Updated');
            return \redirect()->back();
        }
    }


    public function subjectDelete($subject_id){
        $subject = Subject::find($subject_id);

        if ($subject->delete()){

            Session::flash('success', 'Data Deleted Successfully');
            return \redirect('subject/index');
        }else{
            Session::flash('error', 'Data can not be Deleted');
            return \redirect()->back();
        }
    }



}
