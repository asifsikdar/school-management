@extends('Admin.admin_master')
@section('admin.content')
<div class="content-wrapper">
    <div class="container-full">	  
      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Add User Form</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="post" action="{{route('user.update',$data->id)}}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <h5>User Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="usertype" id="select" required class="form-control">
                                        <option value="" selected="" disabled="">Select Role</option>
                                        <option value="Admin" {{$data->usertype == "Admin" ? "selected" : ""}}>Admin</option>
                                        <option value="User" {{$data->usertype == "User" ? "selected" : ""}}>User</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <h5>User Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" value="{{$data->name}}" class="form-control" required="" aria-invalid="false"> </div>
                                </div>
                        </div>    
                      </div>
                    <div class="row">
                      <div class="col-6">						
                          <div class="form-group">
                              <h5>Email Address <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="email" name="email" value="{{$data->email}}" class="form-control" required data-validation-required-message="This field is required"> </div>
                          </div>
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

@endsection