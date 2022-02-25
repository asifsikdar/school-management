@extends('Admin.admin_master')
@section('admin.content')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
              <div class="box">
                  <div class="box-header">						
                      <h3 class="box-title">Employee Salary List</h3>
                      <a href="{{route('employee.registration.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Employee Salary</a>
                  </div>
                  <div class="box-body">
                      <div class="table-responsive">
                          <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                              <thead>
                                  <tr>
                                      <th width="5%">SL</th>
                                      <th>Previous Salary</th>
                                      <th>Increment Salary</th>
                                      <th>Present Salary</th>
                                      <th>Effected Date</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($salary_log as $key => $value)
                                  <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$value->previous_salary}}</td>
                                      <td>{{$value->increment_salary}}</td>
                                      <td>{{$value->present_salary}}</td>
                                      <td>{{$value->effected_salary}}</td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
@endsection