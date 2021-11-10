@include('profile.header')

<style>
    .btn-approve_reject{
        border: none;
    color: white;
    padding: 4px 4px 6px 10px;
    font-size: 15px;
    cursor: pointer;
    text-align: center;
    justify-content: center;
    margin: 0px;
    }
</style>

                    <div class="pcoded-content">

                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">

@if (count($errors) > 0)
<div class = "alert alert-danger">
   <ul>
      @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{Session::get('success')}}</p>
</div>
@endif
                        <!-- Page body start -->
                        <div class="page-body">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Add Profile</h5>
                                            <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                        </div>



                                        <div class="card-block">
                                            <form class="form-material" enctype="multipart/form-data"     action="{{url('/')}}/add_profile" method="POST">
                                                @csrf

                                                <div class="form-group form-default">
                                                    <input type="text" class="form-control @if(old('affiliate') != '') {{"fill"}} @endif" value="{{old('name')}}" id="name" name="name" aria-describedby="name"  required>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Name</label>
                                                </div>
                                                <div class="form-group form-default">
                                                    <input type="email" class="form-control @if(old('affiliate') != '') {{"fill"}} @endif" value="{{old('email')}}" id="email" name="email" aria-describedby="email"  required>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Email</label>
                                                </div>
                                                <div class="form-group form-default">
                                                    <textarea row="5" class="form-control @if(old('address') != '') {{"fill"}} @endif" name="address">{{old('address')}}</textarea>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Address</label>
                                                </div>
                                                <div class="form-group form-default">
                                                    <input type="date" class="form-control fill" value="{{old('dob')}}" id="dob" name="dob" aria-describedby="dob"  required>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Date Of Birth</label>
                                                </div>
                                                <div class="form-group form-default">
                                                    <select class="form-control " id="education" name="education" required>
                                                        <option value="">Select Education</option>
                                                        <option value="B.E">B.E</option>
                                                        <option value="Diplamo">Diplamo</option>

                                                      </select>

                                                    {{-- <label class="float-label">Select Category</label> --}}
                                                </div>
                                                <div class="form-group form-default">
                                                    <select class="form-control " id="country" name="country" required>
                                                        <option value="">Select Country</option>
                                                       @foreach ($countries as $country)
                                                          <option value="{{$country->id}}" @if(old('country') == $country->id) {{"selected"}} @endif>{{$country->name}}</option>
                                                       @endforeach
                                                      </select>

                                                    {{-- <label class="float-label">Select Category</label> --}}
                                                </div>

                                                <div class="form-group form-default">
                                                    <select class="form-control" id="state" name="state" required>
                                                        <option value="">Select State</option>

                                                      </select>

                                                    {{-- <label class="float-label">Select Category</label> --}}
                                                </div>

                                                <div class="form-group form-default">
                                                    <select class="form-control" id="city" name="city" required>
                                                        <option value="">Select City</option>

                                                      </select>

                                                    {{-- <label class="float-label">Select Category</label> --}}
                                                </div>
                                                <div class="form-group checkbox-fade fade-in-primary d-">
                                                    <label>
                                                        <input type="radio" name="status" value="1">
                                                        <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                        <span class="text-inverse">Active</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="status" value="0">
                                                        <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                        <span class="text-inverse">In active</span>
                                                    </label>
                                                </div>


                                                <div class="form-group form-default">
                                                    <input type="number" class="form-control @if(old('pincode') != '') {{"fill"}} @endif" value="{{old('pincode')}}" id="pincode" name="pincode" required aria-describedby="pincode">
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Pincode</label>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Upload Profile Image</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" class="form-control" name="profile_image" accept="image/png, image/gif, image/jpeg">
                                                    </div>
                                                </div>



                                                <div class="text-center">
                                                <button class="btn waves-effect waves-light btn-primary">Submit</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>

                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->

                            <div id="styleSelector">

                            </div>
                        </div>


@include('profile.footer')
    <!-- Notification.css -->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/material_able-main/assets/pages/notification/notification.css">
    <!-- notification js -->
    <script type="text/javascript" src="{{url('/')}}/material_able-main/assets/js/bootstrap-growl.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/material_able-main/assets/pages/notification/notification.js"></script>

    <script>

        $('#country').change(function(e){
            if($(this).val() != ''){
                $.ajax({
                    url : '{{url("/getState/")}}/'+$(this).val(),
                    type: "GET",
                    success: function(response){
                            $('#state').html('<option value="">Select State</option>');
                            var state = '';

                        $.each(response,function(index,value){
                            state += `<option value="${value.id}">${value.name}</option>`;
                        });
                        $('#state').append(state);
                    }
                })
            }else{
                $('#state').html('<option value="">Select State</option>');
            }
        })

        $('#state').change(function(e){
            if($(this).val() != ''){
                $.ajax({
                    url : '{{url("/getCity/")}}/'+$(this).val(),
                    type: "GET",
                    success: function(response){
                        $('#city').html('<option value="">Select City</option>');
                            var city = '';
                        $.each(response,function(index,value){
                            city += `<option value="${value.id}">${value.name}</option>`;
                        });
                        $('#city').append(city);
                    }
                })
            }else{
                $('#city').html('<option value="">Select City</option>');
            }
        })

        // $("#addprofile").validate({
        //     errorClass: "text-danger",
        // });

</script>
