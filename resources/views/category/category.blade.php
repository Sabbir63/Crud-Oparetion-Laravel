@extends('layouts.dashboard')
@section('breadcome')
<div class="row custom_bread_part">
    <div class="col-md-12 bread">
        <ul>
            <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a><i class="fa fa-angle-double-right"></i>Category </a></li>
        </ul>
    </div>
  </div>
@endsection
@section('dashboard_content')
          <div class="col-lg-6">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  @if(session('addpeople'))
                   <div class="alert alert-success">
                     {{session('addpeople')}}
                     @endif
                   </div>
                    <tr>
                        <th>Se No</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse($categories as $category)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$category->catename}}</td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('categoryEdit',$category->id)}}" type="button" class="btn btn-success">Edit</a>
                            <a href="{{route('categorydelete',$category->id)}}" type="button" class="btn btn-danger">Delete</a>
                          </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                      Data Not Avalable
                    </tr>
                    @endforelse
                </tbody>
            </table>
          </div>
          <div class="col-lg-6">
            <div class="row">
            <div class="container">
              <div class="card">
                @if(session('cateinsert'))
                 <div class="alert alert-success">
                   {{session('cateinsert')}}
                 </div>
                 @endif
                <div class="card-header"></div>
                <form action="{{route('categorySubmit')}}" method="post">
                  @csrf
                    <div class="xt" style="padding: 12px;">
                    <div class=" extra col-lg-6 m-auto m-t">
                        <div class="form-group">
                            <label class="text-success" for="exampleInputEmail1">Add Category</label>
                            <input type="text" class="form-control @error ('catename') is-invalid @enderror" name="catename" value="">
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
