@extends('layouts.auth')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Click Start Button To Start Exam</div>

                    <div class="card-body">
                        <!-- Start Timer -->
                        <div>
                            <button class="start">start</button>
                        </div>
                        <div class="timer"></div>
                        <!-- End Timer -->

                        @if(!empty($question_set))
                            <?php
                            $title = \App\Title::where('id', $question_set->title_id)->where('status', 1)->first();
                            $set = \App\QuesSet::where('id', $question_set->set_id)->where('status', 1)->first();
                            $subject = \App\Subject::where('id', $question_set->subject_id)->where('status', 1)->first();

                            $semester = $question_set->semester_id==1?'First': ($question_set->semester_id==2?'Second':'Third') ;
                            ?>

                            <form id="form" action="{{ url('student-ans-paper/store') }}" method="POST" >
                                @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="inspection_Authority">{!! 'Exam Title' !!}<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" name="title" value="{!! $title->title_desc !!}" class="form-control text-danger" id="title" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="inspection_Authority">{!! 'Semester Selection' !!}<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" name="semester" value="{!! $semester.' Semester' !!}" class="form-control text-danger" id="title" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="inspection_Authority">{!! 'Subject' !!}<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" name="subject" value="{!! $subject->subject_name !!}" class="form-control text-danger" id="title" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            @php($j=1)
                            @if(!empty($question_set->ques_ids))
                            <?php
                            $question_ids = explode(',', $question_set->ques_ids);
//                            $question_ids = shuffle($question_ids);
                            ?>
                            @foreach($question_ids as $key=>$ques)
                            <?php
                            $question_option = \App\Question::where('id', $ques)->where('status', 1)->first();
                            //                    dd($question_option);
                            ?>
                            <div class="row question d-none">
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
                                                    <input type="radio"  name="{!! $question_option->id !!}" style="width: 15%" value="{!! $question_option->id !!}" class="form-control mt-2 d-inline-block" id="title">{!! $question_option->$optn !!}
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $j++;?>
                            @endforeach
                            @endif



                            <div class="col-md-12 mt-2 question d-none">
                                <div class="form-group">
                                    <div class="col-md-12 ">
                                        <button type="submit" class="btn btn-primary pull-right submit" style="margin-right: 5px;">{!!'SAVE'!!}</button>
                                    </div>
                                </div>
                            </div>

                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script type="text/javascript">
        (function($){
            var initMin = 0.1;
            var time = initMin*60;
            var sec , min;
            timeConvertion();
            $(document).ready(function(){

                updateTimer();


            });
            function countdownStart() {
                if(time != 0){
                    time--;
                } else{
                    $(".submit").click();
                    clearInterval(interval);
                }
                timeConvertion();
                updateTimer();
            }

            function timeConvertion(){
                sec = time % 60; //Updating second
                min = Math.floor(time/60); //Updating minute
                sec = (sec <= 9) ? "0" + sec : sec;
                min = (min <= 9) ? "0" + min : min;
            }
            function updateTimer(){
                $(".timer").html(min + " : " + sec);
            }

            $(".start").click(function(){
                $this = $(this)
                $this.attr("disabled","disabled");
                $('.question').removeClass('d-none');
                // $(".form_container").fadeIn();
                interval = setInterval(countdownStart,1000);
            });



        })(jQuery);
    </script>
@endsection
