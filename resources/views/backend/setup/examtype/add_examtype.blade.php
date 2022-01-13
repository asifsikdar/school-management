@extends('Admin.admin_master')
@section('admin.content')
<div class="content-wrapper">
    <div class="container-full">	  
      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Add Student Exam Type</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="post" action="{{route('student.exam.type.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <h5>Add Student Exam Type<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" aria-invalid="false">
                                    @error('name')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
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