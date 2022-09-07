@extends('layouts.dashboard')
@section('breadcome')
<div class="row custom_bread_part">
    <div class="col-md-12 bread">
        <ul>
            <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a><i class="fa fa-angle-double-right"></i>Category Edit </a></li>
        </ul>
    </div>
  </div>
@endsection
@section('dashboard_content')
          <div class="col-lg-6 m-auto">
            <div class="row">
            <div class="container">
              <div class="card">
                @if(session('cateinsert'))
                 <div class="alert alert-success">
                   {{session('cateinsert')}}
                 </div>
                 @endif
                <div class="card-header"></div>
                <form action="{{route('categoryUpdate',$categoryedit->id)}}" method="post">
                  @csrf
                    <div class="xt" style="padding: 12px;">
                    <div class=" extra col-lg-6 m-auto m-t">
                        <div class="form-group">
                            <label class="text-success" for="exampleInputEmail1">Add Category</label>
                            <input type="text" class="form-control @error ('catename') is-invalid @enderror" name="catename" value="{{$categoryedit->catename}}">
                            @error('catename')
                             <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button style="margin-left: 45%;" type="submit">Submit</button>
                  </div>
                </form>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          </div>


@endsection
