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
                      <h3 class="box-title">Employee Leave</h3>
                      <a href="{{route('employee.leave.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Employee Leave</a>
                  </div>
                  <div class="box-body">
                      <div class="table-responsive">
                          <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                              <thead>
                                  <tr>
                                      <th width="5%">SL</th>
                                      <th>Name</th>
                                      <th>Id No</th>
                                      <th>Purpose</th>
                                      <th>Start Date</th>
                                      <th>End Date</th>
                                      <th width="25%">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($allData as $key => $leave)
                                  <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$leave['user']['name']}}</td>
                                      <td>{{$leave['user']['id_no']}}</td>
                                      <td>{{$leave['purpose']['name']}}</td>
                                      <td>{{$leave->start_date}}</td>
                                      <td>{{$leave->end_date}}</td>
                                      <td>
                                          <a href="{{route('employee.leave.edit',$leave->id)}}" class="btn btn-info">Edit</a>
                                          <a href="{{route('employee.leave.delete',$leave->id)}}" class="btn btn-danger">Delete</a>
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