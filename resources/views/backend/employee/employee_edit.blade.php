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
            <h4 class="box-title">Update Employee Info</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="post" action="{{route('employee.registration.update',$editData->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                          <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Employee Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" value="{{$editData->name}}" class="form-control" aria-invalid="false">
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
                                        <input type="text" name="fname" value="{{$editData->fname}}" class="form-control" aria-invalid="false">
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
                                        <input type="text" name="mname" value="{{$editData->mname}}" class="form-control" aria-invalid="false">
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
                                      <input type="number" name="mobile" value="{{$editData->mobile}}" class="form-control" aria-invalid="false">
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
                                      <input type="text" name="address" value="{{$editData->address}}" class="form-control" aria-invalid="false">
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
                                        <option value="Male" {{($editData->gender == 'Male')? 'selected' : ''}}>Male</option>
                                        <option value="Female" {{($editData->gender == 'Female')? 'selected' : ''}}>Female</option>
                                        <option value="Others" {{($editData->gender == 'Others')? 'selected' : ''}}>Others</option>
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
                                        <option value="Islam" {{($editData->religion == 'Islam')?'selected':''}}>Islam</option>
                                        <option value="Hindu" {{($editData->religion == 'Hindu')?'selected':''}}>Hindu</option>
                                        <option value="Christan" {{($editData->religion == 'Christan')?'selected':''}}>Christan</option>
                                    </select>
                                  </div>
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                  <h5>Date Of Birth<span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="date" name="dob" value="{{$editData->dob}}" class="form-control" aria-invalid="false">
                                      @error('dob')
                                      <span class="text-danger">{{ $message}}</span>
                                      @enderror
                                  </div>
                              </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Designation<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                      <select name="designation_id" id="designation_id" required class="form-control">
                                          <option value="" selected="" disabled="">Select Designation</option>
                                          @foreach ($designation as $desi)
                                          <option value="{{$desi->id}}" {{($editData->designation_id == $desi->id)?'selected':''}}>{{$desi->name}}</option>
                                         @endforeach
                                      </select>
                                    </div>
                                </div>
                              </div>
                        </div>{{-- end 3rd row --}}

                        <div class="row">{{-- start 4th row --}}
                          @if (!@editData)
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Salary<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="salary" value="{{$editData->salary}}" class="form-control" aria-invalid="false">
                                        @error('salary')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                </div>
                              </div>
                           @endif

                            @if (!@editData)
                              <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Join Date<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="join_date" value="{{$editData->join_date}}" class="form-control" aria-invalid="false">
                                        @error('join_date')
                                        <span class="text-danger">{{ $message}}</span> 
                                        @enderror
                                    </div>
                                </div>
                              </div>
                            @endif   

                              <div class="col-md-3">
                                <div class="form-group">
                                    <h5>User Profile <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" id="image" name="image" class="form-control" required="" aria-invalid="false">
                                    </div>
                                </div> 
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                    <div class="controls">
                                        <img id="showimage" src="{{(!empty($editData->image))? url('upload/employee_image/'.$editData->image):url('upload/no_image.jpg') }}" style="width: 150px; height:150px; 
                                        border:1px solid black">
                                    </div>
                                </div> 
                              </div>
                         </div>{{-- end 4th row --}}
                        
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