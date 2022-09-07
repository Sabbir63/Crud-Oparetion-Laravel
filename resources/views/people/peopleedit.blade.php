@extends('layouts.dashboard')
@section('breadcome')
<div class="row custom_bread_part">
    <div class="col-md-12 bread">
        <ul>
            <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a><i class="fa fa-angle-double-right"></i>People Edit </a></li>
        </ul>
    </div>
  </div>
@endsection
@section('dashboard_content')

    <div class="col-lg-10 m-auto">
      @if(session('update_people'))
       <div class="alert alert-success">
         {{session('update_people')}}
         @endif
            <div class="container">
              <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                  <form action="{{route('allPeopleUpdate',$editPeople->id)}}" method="post">
                  @csrf
                    <div class=" extra col-lg-4" style="float: left;">
                        <div class="form-group">
                          @php
                          $subCategories = App\Models\Subcategory::all();
                          @endphp
                            <label class="text-success" for="exampleInputEmail1">Select Depertment</label>
                            <select id="subcategory" class="form-control @error ('depertment_id') is-invalid @enderror" name="depertment_id">
                                <option value="{{$editPeople->depertment_id}}">{{$editPeople->Category->catename}}</option>
                            </select>
                            @error('depertment_id')
                             <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class=" extra col-lg-4" style="float: left;">
                        <div class="form-group">
                            <label class="text-success" for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control @error ('name') is-invalid @enderror" placeholder="Please Input Name" name="name" value="{{$editPeople->name}}">
                            @error('name')
                             <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class=" extra col-lg-4" style="float: left;">
                        <div class="form-group">
                            <label class="text-success" for="exampleInputEmail1">Phone</label>
                            <input type="phone" class="form-control @error ('phone') is-invalid @enderror" placeholder="Please Input your phone" name="phone" value="{{$editPeople->phone}}">
                            @error('phone')
                             <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                       <div class=" extra col-lg-4" style="float: left;">
                        <div class="form-group">
                            <label class="text-success" for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control @error ('email') is-invalid @enderror" placeholder="Please Input Your email" name="email" value="{{$editPeople->email}}">
                            @error('email')
                             <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                      <div class=" extra col-lg-4" style="float: left;">
                        <div class="form-group">
                            <label class="text-success" for="exampleInputEmail1">Designation</label>
                            <input type="text" class="form-control @error ('designation') is-invalid @enderror" placeholder="Please Input your designation" name="designation" value="{{$editPeople->designation}}">
                            @error('designation')
                             <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button class="baton" type="submit">Submit</button>
                </form>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>

@endsection
