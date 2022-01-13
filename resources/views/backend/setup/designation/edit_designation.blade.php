@extends('Admin.admin_master')
@section('admin.content')
<div class="content-wrapper">
    <div class="container-full">	  
      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Edit Designation</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="post" action="{{route('designation.update',$designation->id)}}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <h5><span class="text-danger">*</span> Designation</h5>
                                <div class="controls">
                                    <input type="text" name="name" value="{{$designation->name}}" class="form-control" aria-invalid="false">
                                    @error('name')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
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