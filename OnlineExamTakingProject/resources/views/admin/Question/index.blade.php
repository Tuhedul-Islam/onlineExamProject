@extends('admin.master')

@section('mainContent')
<div class="row">
    <div class="col-md-12">
        <div class="offset-md-10 col-md-2">
            <a class="btn btn-info btn-effect-ripple " style="text-align: right;" href="{{ URL::to('add/question') }}" ><i class="fa fa-plus"></i> Add Question</a>
        </div>
    </div>
</div>
<div class="row">
    <table width="100%" cellpadding="5px" class="table-hover table-responsive-md table-bordered table-striped">
        <thead>
            <tr>
                <th width="5%">SL#</th>
                <th  width="25%">Question</th>
                <th>Option1</th>
                <th>Option2</th>
                <th>Option3</th>
                <th>Option4</th>
                <th>Option5</th>
                <th>Answer</th>
                <th width="20%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @php($sl =0)
        @if(!empty($allQuestion))
            @foreach($allQuestion as $question)
            <tr>
                <td class="text-center">{{++$sl}}</td>
                <td class="text-center">{!! $question->ques_name !!}</td>
                <td class="text-center">{!! $question->option1 !!}</td>
                <td class="text-center">{!! $question->option2 !!}</td>
                <td class="text-center">{!! $question->option3 !!}</td>
                <td class="text-center">{!! $question->option4 !!}</td>
                <td class="text-center">{!! $question->option5 !!}</td>
                <td class="text-center">{!! $question->answer !!}</td>
                <td class="text-center">
                    <a class="btn btn-primary btn-xs d-none" href="{{ URL::to('question-edit/'.$question->id) }}" title="Edit" >
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-xs" href="{{ URL::to('question-delete/'.$question->id) }}" title="Delete" onclick="return confirm('Are You Sure?');">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-md-4">
        <button class="btn btn-primary mt-3">See Subject wise Question</button>
    </div>
</div>
@endsection
