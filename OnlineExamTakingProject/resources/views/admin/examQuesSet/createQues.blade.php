@extends('admin.master')

@section('mainContent')
<div class="row">
    <h2 class="text-uppercase">CREATE "{!! $subject->subject_name !!}" QUESTION </h2>
    <div class="col-md-12">
        <form id="form" action="{{ url('question-set/store') }}" method="POST" >
            @csrf

            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Exam Title' !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <select name="title" id="status" class="form-control">
                                @foreach($examTitle as $title)
                                    <option value="{{$title->id}}">{!! $title->title_desc !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Semester Selection' !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <select name="semester" id="status" class="form-control">
                                <option value="1">{!! 'Frist Semester' !!}</option>
                                <option value="2">{!! 'Second Semester' !!}</option>
                                <option value="3">{!! 'Third Semester' !!}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Ques Set' !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <select name="set" id="status" class="form-control">
                                @foreach($quesSet as $set)
                                    <option value="{{$set->id}}">{!! $set->set_name !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Subject' !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <select name="subject" id="status" class="form-control">
                                <option value="{!! $subject->id !!}">{!! $subject->subject_name !!}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-danger mt-3">SELECT ONLY "TEN" QUESTION</h2>
                </div>
            </div>

            @php($j=1)
            @if(!empty($question))
            @foreach($question as $key=>$ques)
            <div class="col-md-12 mt-3">
                <div class="col-md-12">
                    <div class="form-group ">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Question No '.$j !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <input type="checkbox"  name="selectedQues[]" style="width: 15%" value="{!! $ques->id !!}" class="form-control mt-2 d-inline-block" id="title">
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="" value="{!! $ques->ques_name !!}" class="form-control" id="title" readonly>
                                @for($i=1; $i<6; $i++)
                                    @php($optn = "option$i")
                                    <input type="text"  name="" style="width: 15%" value="{!! $ques->$optn !!}" class="form-control mt-2 d-inline-block" id="title" readonly>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $j++;?>
            @endforeach
            @endif

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
