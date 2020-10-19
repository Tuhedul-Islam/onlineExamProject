@extends('admin.master')

@section('mainContent')
<div class="row">
    <div class="col-md-12">
        <form id="form" action="{{ url('set/update/'.$setInfo->id) }}" method="POST" >
            @csrf

            <div class="col-md-12">
                <div class="col-md-8">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Add Set' !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="set_name" class="form-control" id="subject_name" value="{!! $setInfo->set_name !!}" required="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Status' !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">De-active</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-2 ">
                <div class="form-group">
                    <div class="col-md-12 ">
                        <button type="submit" class="btn btn-primary pull-right" style="margin-right: 5px;">{!!'Update'!!}</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
