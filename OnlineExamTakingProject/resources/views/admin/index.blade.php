@extends('admin.master')

@section('mainContent')
    <?php $total_ques  = \App\Question::all(); ?>
    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
        <div class="tile_count">
            <div class="col-md-6 col-sm-6  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Question</span>
                <div class="count">{!! count($total_ques) !!}</div>
            </div>
            <div class="col-md-6 col-sm-6  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Exam</span>
                <div class="count green">Empty</div>
            </div>
        </div>
    </div>
    <!-- /top tiles -->
@endsection
