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
            <h4 class="box-title">Edit Student</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="post" action="" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden" name="id" value="{{$editData->id}}"> --}}
                    <div class="row">
                        <div class="col-12">
                          <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Student Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" value="" class="form-control" aria-invalid="false">
                                        @error('name')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                </div>
                              </div>

                              {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Father's Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="fname" value="{{$editData['student']['fname']}}" class="form-control" aria-invalid="false">
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
                                        <input type="text" name="mname" value="{{$editData['student']['mname']}}" class="form-control" aria-invalid="false">
                                        @error('mname')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                </div>
                              </div>
                          </div>{{-- end 1st row --}}

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