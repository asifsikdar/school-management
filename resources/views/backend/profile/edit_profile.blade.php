@extends('Admin.admin_master')
@section('admin.content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">	  
      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Edit Profile Form</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="post" action="{{route('profile.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">						
                            <div class="form-group">
                                <h5>User Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" value="{{$user->name}}" class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <h5>User Email <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control" required="" aria-invalid="false"> </div>
                                </div>
                        </div>    
                      </div>
                    <div class="row">
                      <div class="col-6">						
                          <div class="form-group">
                              <h5>User Mobile <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="text" name="mobile" value="{{$user->mobile}}" class="form-control" required data-validation-required-message="This field is required"> </div>
                          </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                            <h5>User Address <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="address" value="{{$user->address}}" class="form-control" required="" aria-invalid="false"> </div>
                            </div>
                        </div> 
                       </div>
                     
                    
                      <div class="row">
                        <div class="col-6">						
                            <div class="form-group">
                                <h5> Select Gender<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="gender" id="select" required class="form-control">
                                        <option value="" selected="" disabled="">Select</option>
                                        <option value="Male" {{$user->gender == "Male" ? "selected" : ""}}>Male</option>
                                        <option value="Female" {{$user->gender == "Female" ? "selected" : ""}}>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                              <h5>User Profile <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="file" id="image" name="image" class="form-control" required="" aria-invalid="false"> </div>
                              </div>
                          </div> 
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <img id="showimage" src="{{(!empty($user->image) ? url('upload/user_image/'.$user->image) : url('upload/no_image.jpg'))}}" style="width: 150px; height:150px; 
                                border:1px solid black">
                            </div>
                        </div> 

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info" value="Update">
                        </div>  
                  </form>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
               $('#showimage').attr('src',e.target.result);  
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
   </script>
@endsection