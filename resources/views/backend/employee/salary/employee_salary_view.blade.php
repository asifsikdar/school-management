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
                                      <th>Name</th>
                                      <th>Id No</th>
                                      <th>Mobile</th>
                                      <th>Gender</th>
                                      <th>Join Date</th>
                                      <th>Salary</th>
                                      <th width="25%">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($allData as $key => $employee)
                                  <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$employee->name}}</td>
                                      <td>{{$employee->id_no}}</td>
                                      <td>{{$employee->mobile}}</td>
                                      <td>{{$employee->gender}}</td>
                                      <td>{{date('d-m-Y', strtotime($employee->join_date))}}</td>
                                      <td>{{$employee->salary}}</td>
                                      <td>
                                          <a title="increment" href="{{route('employee.increment.salary',$employee->id)}}" class="btn btn-info"><i class="fa fa-plus-circle"></i></a>
                                          <a title="details" href="{{route('employee.increment.details',$employee->id)}}" class="btn btn-danger"><i class="fa fa-eye"></i></a>
                                      </td>
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