<?php

namespace App\Http\Controllers;

use App\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(){
        return view('admin.profile');
    }

    public function titleIndex(){
        $allTitle = Title::where('status', 1)->get();
        return view('admin.title.index', compact('allTitle'));
    }

    public function addTitle(){
        return view('admin.title.addTitle');
    }

    public function titleStore(Request $request){
//        dd($request->all());

        if (!empty($request->title)){
            $title = new Title();
            $title->title_desc = $request->title;
            $title->status = $request->status;
            $title->save();

            Session::flash('success', 'Data Created Successfully');
            return \redirect('add/title');
        }else{
            Session::flash('error', 'Data can not be Created');
            return \redirect()->back();
        }


    }

    public function titleEdit($title_id){
        $titleInfo = Title::where('id', $title_id)->first();
        return view('admin.title.editTitle', compact('titleInfo'));
    }

    public function titleUpdate(Request $request, $title_id){
        $title = Title::find($title_id);
        if (!empty($title)){
            $title->title_desc = $request->title;
            $title->status = $request->status;
            $title->save();

            Session::flash('success', 'Data Updated Successfully');
            return \redirect('title/index');
        }else{
            Session::flash('error', 'Data can not be Updated');
            return \redirect()->back();
        }
    }

    public function titleDelete($title_id){
        $title = Title::find($title_id);

        if (!empty($title)){
            $title->delete();

            Session::flash('success', 'Data Deleted Successfully');
            return \redirect('title/index');
        }else{
            Session::flash('error', 'Data can not be Deleted');
            return \redirect()->back();
        }
    }

}
