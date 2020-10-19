@extends('admin.master')

@section('mainContent')
<div class="row">
    <h2 class="text-center text-uppercase">Hi, {{\Illuminate\Support\Facades\Auth::user()->name}}</h2>
</div>

<div class="row">
    <p class="text-success text-uppercase mx-auto"> <u class="font-weight-bold">Your Informations</u></p>
</div>

<div class="row">
    <div class="col-md-6">
        <p class="text-center">Name</p>
    </div>
    <div class="col-md-6">
        <p class="text-center">{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <p class="text-center">Email</p>
    </div>
    <div class="col-md-6">
        <p class="text-center">{{\Illuminate\Support\Facades\Auth::user()->email}}</p>
    </div>
</div>
@endsection
