@extends('Admin.admin_master')
@section('admin.content')
<div class="content-wrapper">
    <div class="container-full">	  
      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Employee Increment Salary</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="post" action="{{route('update.increment.store',$allData->id)}}">
                    @csrf
                    <div class="row">
                        <div class="col-6">						
                            <div class="form-group">
                                <h5>Salary Amount <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="increment_salary" class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <h5>Effected Date <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="effected_salary" class="form-control" required="" aria-invalid="false"> </div>
                                </div>
                            </div>    
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info" value="submit">
                        </div>
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