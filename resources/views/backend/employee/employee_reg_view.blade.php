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
                      <h3 class="box-title">Employee List</h3>
                      <a href="{{route('employee.registration.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Employee</a>
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
                                      @if(Auth::user()->role == "Admin")
                                      <th>Code</th>
                                      @endif
                                      <th width="25%">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($alldata as $key => $employee)
                                  <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$employee->name}}</td>
                                      <td>{{$employee->id_no}}</td>
                                      <td>{{$employee->mobile}}</td>
                                      <td>{{$employee->gender}}</td>
                                      <td>{{$employee->join_date}}</td>
                                      <td>{{$employee->salary}}</td>
                                      @if(Auth::user()->role == "Admin")
                                      <td>{{$employee->code}}</td>
                                      @endif
                                      <td>
                                          <a href="{{route('employee.registration.edit',$employee->id)}}" class="btn btn-info">Edit</a>
                                          <a target="_blank" href="{{route('employee.registration.details',$employee->id)}}" class="btn btn-danger">Details</a>
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