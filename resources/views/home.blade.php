@extends('layouts.dashboard')
@section('breadcome')
<div class="row custom_bread_part">
    <div class="col-md-12 bread">
        <ul>
            <li><a><i class="fa fa-angle-double-right"></i>Dashboard </a></li>
        </ul>
    </div>
  </div>
@endsection
@section('dashboard_content')
<div class="body" style="padding: 72px;">
    <h3>Welcome to dashboard</h3>
    <br>
    <br>
    <br>
    <br>
    <h5>{{Auth::User()->name}}</h5>
  </div>
@endsection
