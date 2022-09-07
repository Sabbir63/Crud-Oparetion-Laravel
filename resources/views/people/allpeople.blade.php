@extends('layouts.dashboard')
@section('breadcome')
<div class="row custom_bread_part">
    <div class="col-md-12 bread">
        <ul>
            <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a><i class="fa fa-angle-double-right"></i>All People </a></li>
        </ul>
    </div>
  </div>
@endsection

@section('dashboard_content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#exampleModal">
  <i class="fa fa-user-plus"></i>  Add People
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="myModal" class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-plus"></i>  Add People</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('addPeople')}}" method="post">
                  @csrf
                    <div class=" extra col-lg-3" style="float: left; margin: 5px 10px;">
                        <div class="form-group">
                          @php
                          $subCategories = App\Models\Subcategory::all();
                          @endphp
                            <label class="text-success" for="exampleInputEmail1">Select Depertment</label>
                            <select id="subcategory" class="form-control @error ('depertment_id') is-invalid @enderror" name="depertment_id">
                                <option value="">Choce Depertment</option>
                                @foreach($subCategories as $subcategory)
                                @php
                                $var = App\Models\Category::where('id',$subcategory->category_id)->get();
                                @endphp
                                @foreach($var as $cate => $category)
                                @if($category->catename == "Depertment")
                                <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                                @endif
                                @endforeach
                                @endforeach
                            </select>
                            @error('depertment_id')
                             <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class=" extra col-lg-3" style="float: left; margin: 5px 10px;">
                        <div class="form-group">
                            <label class="text-success" for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control @error ('name') is-invalid @enderror" placeholder="Please Input Name" name="name" value="">
                            @error('name')
                             <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class=" extra col-lg-3" style="float: left; margin: 5px 10px;">
                        <div class="form-group">
                            <label class="text-success" for="exampleInputEmail1">Phone</label>
                            <input type="phone" class="form-control @error ('phone') is-invalid @enderror" placeholder="Please Input your phone" name="phone" value="">
                            @error('phone')
                             <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                       <div class=" extra col-lg-3" style="float: left; margin: 5px 10px;">
                        <div class="form-group">
                            <label class="text-success" for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control @error ('email') is-invalid @enderror" placeholder="Please Input Your email" name="email" value="">
                            @error('email')
                             <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                      <div class=" extra col-lg-3" style="float: left; margin: 5px 10px;">
                        <div class="form-group">
                            <label class="text-success" for="exampleInputEmail1">Designation</label>
                            <input type="text" class="form-control @error ('designation') is-invalid @enderror" placeholder="Please Input your designation" name="designation" value="">
                            @error('designation')
                             <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button class="baton" type="submit">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        @if(session('addpeople'))
         <div class="alert alert-success">
           {{session('addpeople')}}
           @endif
        @if(session('delete_people'))
         <div class="alert alert-danger">
           {{session('delete_people')}}
           @endif

         </div>
          <tr>
              <th>Se No</th>
              <th>Depertment</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Designation</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
        @forelse($allpeoples as $allpeople)
          <tr>
              <td>{{$loop->index + 1}}</td>
              <td>{{$allpeople->SubCategory->subcategory_name}}</td>
              <td>{{$allpeople->name}}</td>
              <td>{{$allpeople->phone}}</td>
              <td>{{$allpeople->email}}</td>
              <td>{{$allpeople->designation}}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{route('allPeopleEdit', $allpeople->id)}}" type="button" class="btn btn-success">Edit</a>
                  <a href="{{route('allPeopleDelete', $allpeople->id)}}" type="button" class="btn btn-danger">Delete</a>
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

@endsection
