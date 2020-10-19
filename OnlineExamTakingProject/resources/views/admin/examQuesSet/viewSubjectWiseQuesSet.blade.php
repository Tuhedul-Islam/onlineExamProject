@extends('admin.master')

@section('mainContent')
<div class="row">
    <h2 class="text-uppercase">View "{!! $subject->subject_name !!}" QUESTION </h2>
    <div class="col-md-12">

        <form id="form" action="{{ url('question-set/store') }}" method="POST" >
            @csrf
        </form>

<?php $k=1; ?>
@if(!empty($selectedSubjectAllQues))
@foreach($selectedSubjectAllQues as $val)
            <?php
                  $title = \App\Title::where('id', $val->title_id)->where('status', 1)->first();
                  $set = \App\QuesSet::where('id', $val->set_id)->where('status', 1)->first();
                  $subject = \App\Subject::where('id', $val->subject_id)->where('status', 1)->first();

                 $semester = $val->semester_id==1?'First': ($val->semester_id==2?'Second':'Third') ;
            ?>
<h2 class="text-success my-3">{!! 'Question Set No. '.$k !!}</h2>
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Exam Title' !!}<span class="text-danger">*</span></label>
                        </div>

                        <div>
                            <div class="col-md-10">
                                <input type="text" name="title" value="{!! $title->title_desc !!}" class="form-control text-warning" id="title" readonly>
                            </div>
                            <div class="col-md-2">
                                @if($val->status==1)
                                    <a href="{{url('ques-set-status-change/'.$val->id.'/'.$val->status)}}" title="De-Active" class="text-danger"><i class="fa fa-thumbs-down"></i></a>
                                @else
                                    <a href="{{url('ques-set-status-change/'.$val->id.'/'.$val->status)}}" title="Active" class="text-success"><i class="fa fa-thumbs-up"></i></a>
                                @endif
                            </div>
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
                            <input type="text" name="semester" value="{!! $semester.' Semester' !!}" class="form-control text-warning" id="title" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Ques Set' !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="set" value="{!! $set->set_name !!}" class="form-control text-warning" id="title" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Subject' !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="subject" value="{!! $subject->subject_name !!}" class="form-control text-warning" id="title" readonly>
                        </div>
                    </div>
                </div>
            </div>


            @php($j=1)
            @if(!empty($val->ques_ids))
            <?php
                $question_ids = explode(',', $val->ques_ids);
            ?>
            @foreach($question_ids as $key=>$ques)
            <?php
            $question_option = \App\Question::where('id', $ques)->where('status', 1)->first();
//                    dd($question_option);
            ?>
            <div class="col-md-12 mt-3">
                <div class="col-md-12">
                    <div class="form-group ">
                        <div class="col-md-12">
                            <label for="inspection_Authority">{!! 'Question No '.$j !!}<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="" value="{!! $question_option->ques_name !!}" class="form-control" id="title" readonly>
                            @for($i=1; $i<6; $i++)
                                @php($optn = "option$i")
                                <input type="text"  name="" style="width: 15%" value="{!! $question_option->$optn !!}" class="form-control mt-2 d-inline-block" id="title" readonly>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <?php $j++;?>
            @endforeach
            @endif
            <br>
<?php $k++; ?>
@endforeach
@endif



    </div>
</div>
@endsection
