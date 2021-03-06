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
                  <form method="post" action="{{route('user.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <h5>Basic Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="role" id="role" required class="form-control">
                                        <option value="" selected="" disabled="">Select Role</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Operator">Operator</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <h5>User Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" required="" aria-invalid="false"> </div>
                                </div>
                            </div>    
                      </div>
                    <div class="row">
                      <div class="col-6">						
                          <div class="form-group">
                              <h5>Email Address <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
                          </div>
                      </div>
                    <div class="col-6">
                        {{-- <div class="form-group">
                            <h5>Password  <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="password" name="password" class="form-control" required data-validation-required-message="This field is required"> </div>
                        </div> --}}
                    </div>    
                  </div>
                      <div class="text-xs-right">
                          <input type="submit" class="btn btn-rounded btn-info" value="submit">
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