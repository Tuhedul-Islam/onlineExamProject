<?php

namespace App\Http\Controllers;

use App\QuesSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuesSetController extends Controller
{
    public function quesSetIndex(){
        $allQuesSet = QuesSet::where('status', 1)->get();
        return view('admin.QuesSet.index', compact('allQuesSet'));
    }

    public function addQuesSet(){
        return view('admin.QuesSet.addSet');
    }

    public function quesSetStore(Request $request){
//        dd($request->all());

        if (!empty($request->set_name)){
            $set = new QuesSet();
            $set->set_name = $request->set_name;
            $set->status = $request->status;
            $set->save();

            Session::flash('success', 'Data Created Successfully');
            return \redirect('add/quesSet');
        }else{
            Session::flash('error', 'Data can not be Created');
            return \redirect()->back();
        }

    }


    public function quesSetEdit($set_id){
        $setInfo = QuesSet::where('id', $set_id)->first();
        return view('admin.QuesSet.editSet', compact('setInfo'));
    }

    public function quesSetUpdate(Request $request, $set_id){
        $set = QuesSet::find($set_id);

        if (!empty($set)){
            $set->set_name = $request->set_name;
            $set->status = $request->status;
            $set->save();

            Session::flash('success', 'Data Updated Successfully');
            return \redirect('quesSet/index');
        }else{
            Session::flash('error', 'Data can not be Updated');
            return \redirect()->back();
        }
    }


    public function quesSetDelete($set_id){
        $set = QuesSet::find($set_id);

        if ($set->delete()){

            Session::flash('success', 'Data Deleted Successfully');
            return \redirect('quesSet/index');
        }else{
            Session::flash('error', 'Data can not be Deleted');
            return \redirect()->back();
        }
    }


}
