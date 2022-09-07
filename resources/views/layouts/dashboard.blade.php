<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{asset('asset')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('asset')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('asset')}}/css/style.css">
</head>

<body>
    <header>
        <div class="container-fluid header_full">

        </div>
    </header>

    <section>
        <div class="container-fluid content_part_full">
            <div class="row">
                <div class="col-md-2 sidebar_part">
                    <div class="user_part">
                        <img src="{{asset('asset')}}/images/avatar.png" alt="avatar">
                        <h4>{{Auth::User()->name}}</h4>
                        <p><i class="fa fa-circle"></i> Online</p>
                    </div>
                    <div class="menu">
                        <ul id="side-menu">
                            <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Dashboard</a></li>
                            <li><a href="{{route('addCategory')}}"><i class="fa fa-address-book"></i> Add Category</a></li>
                            <li><a href="{{route('addSubCategory')}}"><i class="fa fa-address-card"></i> Add Sub Category</a></li>
                            <li><a href="{{route('allPeople')}}"><i class="fa fa-users"></i> ALl People</a></li>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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
                                                <div class=" extra col-lg-4" style="float: left;">
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
                                                <div class=" extra col-lg-4" style="float: left;">
                                                    <div class="form-group">
                                                        <label class="text-success" for="exampleInputEmail1">Name</label>
                                                        <input type="text" class="form-control @error ('name') is-invalid @enderror" placeholder="Please Input Name" name="name" value="">
                                                        @error('name')
                                                         <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class=" extra col-lg-4" style="float: left;">
                                                    <div class="form-group">
                                                        <label class="text-success" for="exampleInputEmail1">Phone</label>
                                                        <input type="phone" class="form-control @error ('phone') is-invalid @enderror" placeholder="Please Input your phone" name="phone" value="">
                                                        @error('phone')
                                                         <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                   <div class=" extra col-lg-4" style="float: left;">
                                                    <div class="form-group">
                                                        <label class="text-success" for="exampleInputEmail1">Email</label>
                                                        <input type="email" class="form-control @error ('email') is-invalid @enderror" placeholder="Please Input Your email" name="email" value="">
                                                        @error('email')
                                                         <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                  <div class=" extra col-lg-4" style="float: left;">
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

                            @php
                            $categories = App\Models\Category::all();
                            @endphp
                            @foreach($categories as $category)
                            <div class="accordion">
                                <input type="checkbox" id="one_{{$category->id}}" />
                                <label for="one_{{$category->id}}" class="acc-label">{{$category->catename}}</label>
                                <div class="acc-content">
                                  @if($category->subCategory->count() != 0)
                                  @foreach ($category->subCategory as $subCategory)
                                    <li>
                                        <a href="#" data-bs-toggle="collapse">
                                            <span> {{$subCategory->subcategory_name}} </span>
                                        </a>
                                    </li>
                                    @endforeach

                                    @endif
                                </div>
                            </div>
                            @endforeach
                            <li><a href="#"><i class="fa fa-bandcamp"></i> Banner</a></li>
                            <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-md-10 content_part">
                  @yield('breadcome')
                    <div class="row"
                        <div class="col-md-12 main_content">
                          @yield('dashboard_content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container-fluid footer_full">

        </div>
    </footer>

    <script src="{{asset('asset')}}/js/jquery-3.4.1.min.js"></script>
    <script src="{{asset('asset')}}/js/popper.min.js"></script>
    <script src="{{asset('asset')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('asset')}}/js/custom.js"></script>
</body>

</html>
