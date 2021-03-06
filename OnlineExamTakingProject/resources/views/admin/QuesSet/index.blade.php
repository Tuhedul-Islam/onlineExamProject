@extends('admin.master')

@section('mainContent')
<div class="row">
    <div class="col-md-12">
        <div class="offset-md-10 col-md-2">
            <a class="btn btn-info btn-effect-ripple " style="text-align: right;" href="{{ URL::to('add/quesSet') }}" ><i class="fa fa-plus"></i> Add Set</a>
        </div>
    </div>
</div>
<div class="row">
    <table width="100%" cellpadding="5px" class="table-hover table-responsive-md table-bordered table-striped">
        <thead>
            <tr>
                <th width="5%">SL#</th>
                <th>Title</th>
                <th width="20%">Action</th>
            </tr>
        </thead>
        <tbody>
        @php($sl =0)
        @if(!empty($allQuesSet))
            @foreach($allQuesSet as $qSet)
            <tr>
                <td class="text-center">{{++$sl}}</td>
                <td class="text-center">{!! $qSet->set_name !!}</td>
                <td class="text-center">
                    <a class="btn btn-primary btn-xs" href="{{ URL::to('qSet-edit/'.$qSet->id) }}" title="Edit" >
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-xs" href="{{ URL::to('qSet-delete/'.$qSet->id) }}" title="Delete" onclick="return confirm('Are You Sure?');">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
@endsection
