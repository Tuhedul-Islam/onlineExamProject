@extends('admin.master')

@section('mainContent')
<div class="row">
    <div class="col-md-12">
        <form id="form" action="{{ url('question/store') }}" method="POST" >
            @csrf

            <div class="col-md-12">
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Subject' !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <select name="subject_id" id="subject" class="form-control">
                                @foreach($allSubject as $sub)
                                    <option value="{!! $sub->id !!}">{!! $sub->subject_name !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Question Name' !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="question_name" class="form-control" id="title" required="">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
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



            <div class="col-md-12 mt-3">
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Option 1' !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="option1" class="form-control" id="title" required="">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Option 2' !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="option2" class="form-control" id="title" required="">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Option 3' !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="option3" class="form-control" id="title" required="">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Option 4' !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="option4" class="form-control" id="title" required="">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Option 5' !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="option5" class="form-control" id="title" required="">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Answer' !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="answer" class="form-control" id="title" required="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-2 ">
                <div class="form-group">
                    <div class="col-md-12 ">
                        <button type="submit" class="btn btn-primary pull-right" style="margin-right: 5px;">{!!'SAVE'!!}</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
