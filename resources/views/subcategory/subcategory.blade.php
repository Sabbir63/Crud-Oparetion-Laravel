@extends('layouts.dashboard')
@section('breadcome')
<div class="row custom_bread_part">
    <div class="col-md-12 bread">
        <ul>
            <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a><i class="fa fa-angle-double-right"></i>Sub Category </a></li>
        </ul>
    </div>
  </div>
@endsection
@section('dashboard_content')
          <div class="col-lg-12">
          <div class="row">
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
                          <th>Sub Category Name</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @forelse($subcategories as $subcategory)
                      <tr>
                          <td>{{$loop->index + 1}}</td>
                          <td>{{$subcategory->Category->catename}}</td>
                          <td>{{$subcategory->subcategory_name}}</td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{route('subcategoryedit', $subcategory->id)}}" type="button" class="btn btn-success">Edit</a>
                              <a href="{{route('subcategorydelete', $subcategory->id)}}" type="button" class="btn btn-danger">Delete</a>
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
            <div class="container">
              <div class="card">
                @if(session('subcategory'))
                 <div class="alert alert-success">
                   {{session('subcategory')}}
                 </div>
                 @endif
                <div class="card-header"></div>
                <form action="{{route('subcategorySubmit')}}" method="post">
                  @csrf
                    <div class="xt" style="padding: 12px;">
                      <div class=" extra col-lg-10">
                         <div class="form-group groups">
                             <label class="text-success" for="exampleInputEmail1">Select Depertment</label>
                             <select id="subcategory" class="form-control  @error ('category_id') is-invalid @enderror" name="category_id">
                                 <option value="">Choce Depertment</option>
                                 @foreach ($categories as $category)
                                   <option value="{{$category->id}}">{{$category->catename}}</option>
                                 @endforeach
                               </select>
                                 @error('category_id')
                                  <span class="text-danger">{{ $message }}</span>
                                 @enderror
                         </div>
                     </div>
                    <div class=" extra col-lg-10">
                        <div class="form-group groups">
                            <label class="text-success" for="exampleInputEmail1">Add Sub Category</label>
                            <input type="text" class="form-control @error ('subcategory_name') is-invalid @enderror" name="subcategory_name" value="">
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
          </div>
          </div>

@endsection
