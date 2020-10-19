<?php

namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NoticeController extends Controller
{
    public function index(){
        $notice = Notice::where('status', 1)->get();
        return view('admin.notice.index', compact('notice'));
    }

    public function addNotice(){
        $notice = Notice::where('status', 1)->get();
        return view('admin.notice.addNotice', compact('notice'));
    }

    public function noticeStore(Request $request){
//        dd($request->all());

        if (!empty($request->notice_desc)){
            $set = new Notice();
            $set->notice_desc = $request->notice_desc;
            $set->status = $request->status;
            $set->save();

            Session::flash('success', 'Data Created Successfully');
            return \redirect('notice/index');
        }else{
            Session::flash('error', 'Data can not be Created');
            return \redirect()->back();
        }
    }


    public function noticeDelete($notice_id){
        $set = Notice::find($notice_id);

        if ($set->delete()){

            Session::flash('success', 'Data Deleted Successfully');
            return \redirect('notice/index');
        }else{
            Session::flash('error', 'Data can not be Deleted');
            return \redirect()->back();
        }
    }



}
