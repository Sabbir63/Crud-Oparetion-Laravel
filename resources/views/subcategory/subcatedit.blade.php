@extends('layouts.dashboard')
@section('breadcome')
<div class="row custom_bread_part">
    <div class="col-md-12 bread">
        <ul>
            <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a><i class="fa fa-angle-double-right"></i>Edit Subcategory </a></li>
        </ul>
    </div>
  </div>
@endsection
@section('dashboard_content')

    <div class="col-lg-6 m-auto">
            <div class="container">
              <div class="card">
                @if(session('subcategory'))
                 <div class="alert alert-success">
                   {{session('subcategory')}}
                 </div>
                 @endif
                <div class="card-header"></div>
                <form action="{{route('subcategoryupdate',$subcategory->id)}}" method="post">
                  @csrf
                    <div class="xt" style="padding: 12px;">
                      <div class=" extra col-lg-10">
                         <div class="form-group groups">
                             <label class="text-success" for="exampleInputEmail1">Select Depertment</label>
                             <select id="subcategory" class="form-control  @error ('category_id') is-invalid @enderror" name="category_id">
                                 <option value="{{$subcategory->Category->id}}">{{$subcategory->Category->catename}}</option>

                               </select>
                                 @error('category_id')
                                  <span class="text-danger">{{ $message }}</span>
                                 @enderror
                         </div>
                     </div>
                    <div class=" extra col-lg-10">
                        <div class="form-group groups">
                            <label class="text-success" for="exampleInputEmail1">Add Sub Category</label>
                            <input type="text" class="form-control @error ('subcategory_name') is-invalid @enderror" name="subcategory_name" value="{{$subcategory->subcategory_name}}">
                            @error('subcategory_name')
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

@endsection
