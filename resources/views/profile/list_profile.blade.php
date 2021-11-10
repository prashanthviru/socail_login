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

                             </div>
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
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Profile </h5>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                        {{-- <li><i class="fa fa-trash close-card"></i></li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="form-material">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group form-default">
                                                                <input type="text" class="form-control @if(old('name') != '') {{"fill"}} @endif" value="{{old('name')}}" id="name" name="name" aria-describedby="name"  required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group form-default">
                                                                <input type="email" class="form-control @if(old('email') != '') {{"fill"}} @endif" value="{{old('email')}}" id="email" name="email" aria-describedby="email"  required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Email</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group form-default">
                                                                <input type="number" class="form-control @if(old('age') != '') {{"fill"}} @endif" value="{{old('age')}}" id="name" name="age" aria-describedby="age"  required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Age</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group form-default">
                                                                <select class="form-control " id="status" name="status" required>
                                                                    <option value="">Select Status</option>
                                                                    <option value="1">Active</option>
                                                                    <option value="0">Inactive</option>

                                                                  </select>

                                                                {{-- <label class="float-label">Select Category</label> --}}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <button class="btn waves-effect waves-light btn-primary" id="submit">Submit</button>
                                                            <button class="btn waves-effect waves-light btn-primary" id="reset">Reset</button>

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Basic table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Profile List</h5>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                        {{-- <li><i class="fa fa-trash close-card"></i></li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table data-table">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Profile image</th>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Age</th>
                                                                <th>Status</th>
                                                                <th>Action</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{-- @foreach ($profile as $key => $profil)
                                                            <tr>
                                                                <th scope="row">{{$key + 1}}</th>
                                                                <td>{{$profil->NAME}}</td>
                                                                <td>{{$profil->profile_category->CATEGORY_NAME}}</td>
                                                                <td>{{$profil->profile_country->name}}</td>
                                                                <td>{{$profil->profile_state->name}}</td>
                                                                <td>{{$profil->profile_city->name}}</td>
                                                                <td>{{$profil->AFFILIATION}}</td>
                                                                <td><button class="btn btn-approve_reject waves-effect waves-light btn-success"><i class="icofont icofont-check-circled"></i></button> &nbsp; <button class="btn btn-approve_reject waves-effect waves-light btn-danger"><i class="icofont icofont-close-circled"></i></button></td>
                                                            </tr>
                                                            @endforeach --}}
                                                                {{-- <td>{{$profil->STATUS == 1 ? "Approved" : "Pending"}}</td> --}}

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        </div>
                                        <!-- Background Utilities table end -->
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->

                            <div id="styleSelector">

                            </div>
                        </div>


  <!-- Modal -->
  <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Profile Info</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="">
          <div class="row">
              <div class="col-md-12" style="display: flex">
                  <div class="col-md-4">Name</div>
                  <div class="col-md-8" id="modal_name">Prashanth</div>
              </div>
                  <div class="col-md-12" style="display: flex">
                  <div class="col-md-4">Email</div>
                  <div class="col-md-8" id="modal_email">Prashanth@digient.in</div>
                  </div>
                  <div class="col-md-12" style="display: flex">

                  <div class="col-md-4">Date of birth</div>
                  <div class="col-md-8" id="modal_dob">29-08-1993</div>
                  </div>
                  <div class="col-md-12" style="display: flex">

                    <div class="col-md-4">Education</div>
                    <div class="col-md-8" id="modal_education">B.E</div>
                    </div>
                  <div class="col-md-12" style="display: flex">

                  <div class="col-md-4">Address</div>
                  <div class="col-md-8" id="modal_address">Ambur</div>
                  </div>
                  <div class="col-md-12" style="display: flex">

                  <div class="col-md-4">Pincode</div>
                  <div class="col-md-8" id="modal_pincode">643922</div>
                  </div>
                  <div class="col-md-12" style="display: flex">

                  <div class="col-md-4">City </div>
                  <div class="col-md-8" id="modal_city">Ambur</div>
                  </div>
                  <div class="col-md-12" style="display: flex">

                  <div class="col-md-4">State</div>
                  <div class="col-md-8" id="modal_state">Tamil nadu</div>
                  </div>
                  <div class="col-md-12" style="display: flex">

                  <div class="col-md-4">Country </div>
                  <div class="col-md-8" id="modal_country">India</div>
                  </div>
                  <div class="col-md-12" style="display: flex">
                    <div class="col-md-4">Profile image </div>
                    <div class="col-md-8"><img id="modal_profile" src="http://localhost/task/social_login/public/images/profiles/thumbnail/1636475004.png" style="max-width: 200px;max-height:200px" max-width="200" max-height="200"></div>
                    </div>
              </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


@include('profile.footer')
    <!-- Notification.css -->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/material_able-main/assets/pages/notification/notification.css">
    <!-- notification js -->
    <script type="text/javascript" src="{{url('/')}}/material_able-main/assets/js/bootstrap-growl.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/material_able-main/assets/pages/notification/notification.js"></script>
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/material_able-main/assets/pages/notification/notification.css">
    <!-- notification js -->
    <script type="text/javascript" src="{{url('/')}}/material_able-main/assets/js/bootstrap-growl.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/material_able-main/assets/pages/notification/notification.js"></script>

<script type="text/javascript">
    var table;
    $(function () {



       table = $('.data-table').DataTable({

          processing: true,

          serverSide: true,

        //   ajax: "{{ route('list_profile') }}",
                ajax: {
            url: "{{ route('list_profile') }}",
            type: "get", // or 'GET' if you prefer
            data: function (data) {
            data.name = $('#name').val();
            data.email = $('#email').val();
            data.age = $('#age').val();
            data.status = $('#status').val();
                 }
                },

          columns: [

              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'profile_pic', name: 'profile_pic'},

              {data: 'name', name: 'name'},

              {data: 'email', name: 'email'},
              {data: 'dob', name: 'dob'},
              {data: 'status', name: 'status'},
            //   {data: 'action', name: 'action' },
              {data: 'edit', name: 'edit', orderable: false, searchable: false},

          ]

      });

      $('#submit').click(function(e){
          e.preventDefault();

        table.ajax.url("{{ route('list_profile') }}" ).load();
      })

      $('#reset').click(function(e){
          e.preventDefault();
          $('#name').val('');
             $('#email').val('');
         $('#age').val('');
          $('#status').val('');
        table.ajax.url("{{ route('list_profile') }}" ).load();
      })


    });


    function status_update(id,status){

        $.ajax({
            url : "{{ route('update_profile_status')}}",
            type : 'POST',
            data: {id:id,status:status,"_token": "{{ csrf_token() }}"},
            success: function(response){

                    if(response.success){
                        notify(response.message, 'success');
                    }else{
                        notify('Something went wrong', 'danger');
                    }
                    table.ajax.reload()
            }

        })
      }

      function delete_profile(id){
        $.ajax({
            url : "{{ route('delete_profile')}}",
            type : 'POST',
            data: {id:id,"_token": "{{ csrf_token() }}"},
            success: function(response){

                    if(response.success){
                        notify(response.message, 'success');
                    }else{
                        notify('Something went wrong', 'danger');
                    }
                    table.ajax.reload()
            }

        })
      }

      function getProfile(id){
        $.ajax({
            url : "{{ URL('/')}}/getProfile/"+id,
            type : 'get',
            data: {id:id,"_token": "{{ csrf_token() }}"},
            success: function(response){
                $('#modal_name').html(response.name)
                $('#modal_email').html(response.email)

                $('#modal_address').html(response.address)
                $('#modal_education').html(response.education)
                $('#modal_dob').html(response.dob)
                $('#modal_pincode').html(response.pincode)
                $('#modal_city').html(response.profile_city.name)
                $('#modal_state').html(response.profile_state.name)
                $('#modal_country').html(response.profile_country.name)
                $('#modal_profile').attr('src',"{{URL('/')}}/images/profiles/"+response.profile_pic)
                $('#profileModal').modal({
				show: true
			})
                console.log(response)

            }

        })
      }


  </script>
