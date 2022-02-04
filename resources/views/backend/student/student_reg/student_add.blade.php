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
            <h4 class="box-title">Add Student</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="post" action="{{route('student.registration.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                          <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Student Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control" aria-invalid="false">
                                        @error('name')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Father's Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="fname" class="form-control" aria-invalid="false">
                                        @error('fname')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Mother's Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="mname" class="form-control" aria-invalid="false">
                                        @error('mname')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                </div>
                              </div>
                          </div>{{-- end 1st row --}}

                          <div class="row">{{-- start 2nd row --}}
                            <div class="col-md-4">
                              <div class="form-group">
                                  <h5>Mobile Number<span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="number" name="mobile" class="form-control" aria-invalid="false">
                                      @error('mobile')
                                      <span class="text-danger">{{ $message}}</span>
                                      @enderror
                                  </div>
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                  <h5>Address<span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="address" class="form-control" aria-invalid="false">
                                      @error('address')
                                      <span class="text-danger">{{ $message}}</span>
                                      @enderror
                                  </div>
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                  <h5>Gender<span class="text-danger">*</span></h5>
                                  <div class="controls">
                                    <select name="gender" id="gender" required class="form-control">
                                        <option value="" selected="" disabled="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                  </div>
                              </div>
                            </div>
                        </div>{{-- end 2nd row --}}
                         
                        <div class="row">{{-- start 3rd row --}}
                            <div class="col-md-4">
                              <div class="form-group">
                                  <h5>Religion<span class="text-danger">*</span></h5>
                                  <div class="controls">
                                    <select name="religion" id="religion" required class="form-control">
                                        <option value="" selected="" disabled="">Select Religion</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Christan">Christan</option>
                                    </select>
                                  </div>
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                  <h5>Date Of Birth<span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="date" name="dob" class="form-control" aria-invalid="false">
                                      @error('	dob')
                                      <span class="text-danger">{{ $message}}</span>
                                      @enderror
                                  </div>
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                  <h5>Discount<span class="text-danger">*</span></h5>
                                  <div class="controls">
                                    <input type="text" name="discount" class="form-control" aria-invalid="false">
                                    @error('discount')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                  </div>
                              </div>
                            </div>
                        </div>{{-- end 3rd row --}}

                        <div class="row">{{-- start 4th row --}}
                            <div class="col-md-4">
                              <div class="form-group">
                                  <h5>Year<span class="text-danger">*</span></h5>
                                  <div class="controls">
                                    <select name="year_id" id="year_id" required class="form-control">
                                        <option value="" selected="" disabled="">Select Year</option>
                                        @foreach ($years as $year)
                                        <option value="{{$year->id}}">{{$year->name}}</option>
                                       @endforeach
                                    </select>
                                  </div>
                              </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Class<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                      <select name="class_id" id="class_id" required class="form-control">
                                          <option value="" selected="" disabled="">Select Class</option>
                                          @foreach ($classes as $class)
                                          <option value="{{$class->id}}">{{$class->name}}</option>
                                         @endforeach
                                      </select>
                                    </div>
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Group<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                      <select name="group_id" id="group_id" required class="form-control">
                                          <option value="" selected="" disabled="">Select Group</option>
                                          @foreach ($groups as $group)
                                          <option value="{{$group->id}}">{{$group->name}}</option>
                                         @endforeach
                                      </select>
                                    </div>
                                </div>
                              </div>
                        </div>{{-- end 4th row --}}

                        <div class="row">{{-- start 5th row --}}
                            <div class="col-md-4">
                              <div class="form-group">
                                  <h5>Shift<span class="text-danger">*</span></h5>
                                  <div class="controls">
                                    <select name="shift_id" id="shift_id" required class="form-control">
                                        <option value="" selected="" disabled="">Select Shift</option>
                                        @foreach ($shifts as $shift)
                                        <option value="{{$shift->id}}">{{$shift->name}}</option>
                                       @endforeach
                                    </select>
                                  </div>
                              </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>User Profile <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" id="image" name="image" class="form-control" required="" aria-invalid="false">
                                    </div>
                                </div> 
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <div class="controls">
                                        <img id="showimage" src="{{ url('upload/no_image.jpg')}}" style="width: 150px; height:150px; 
                                        border:1px solid black">
                                    </div>
                                </div> 
                              </div>
                        </div>{{-- end 5th row --}}
                         
                         
                           
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