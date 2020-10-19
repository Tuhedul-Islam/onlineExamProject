@extends('layouts.auth')

@section('content')
    <?php
        $opening_exam = \App\ExamQuesSet::where('status', 1)->get();
//        dd($opening_exam);
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Routine</div>

                    <div class="card-body">
                        <h3 class="text-center bg-light text-success">OPENING EXAMS DISPLAYED HERE</h3>
                        <table width="100%" class="table-hover table-bordered" cellpadding="5px">
                            <thead>
                            <tr>
                                <th width="5%">SL#</th>
                                <th>Semester</th>
                                <th>Subject</th>
                                <th width="10px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=0; ?>
                            @foreach($opening_exam as $val)
                                <?php
                                $subject = \App\Subject::where('id', $val->subject_id)->where('status', 1)->first();
                                $semester = ($val->semester_id==1)?'First': ($val->semester_id==2?'Second':'Third') ;
                                ?>

                            <tr>
                                <td>{!! ++$i !!}</td>
                                <td>{!! $semester.' Semester' !!}</td>
                                <td>{!! $subject->subject_name !!}</td>
                                <td class="text-center">
                                    <a class="btn btn-danger btn-xs" href="{{ URL::to('view-exam/'.$val->id) }}" title="View" onclick="return confirm('Are You Ready?');">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
