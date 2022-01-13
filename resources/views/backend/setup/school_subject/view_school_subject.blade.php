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
                      <h3 class="box-title">Student School Subject List</h3>
                      <a href="{{route('student.school.subject.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student School Subject</a>
                  </div>
                  <div class="box-body">
                      <div class="table-responsive">
                          <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                              <thead>
                                  <tr>
                                      <th width="5%">SL</th>
                                      <th>Name</th>
                                      <th width="25%">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($alldata as $key => $examtype)
                                  <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$examtype->name}}</td>
                                      <td>
                                          <a href="{{route('student.school.subject.edit',$examtype->id)}}" class="btn btn-info">Edit</a>
                                          <a href="{{route('student.school.subject.delete',$examtype->id)}}" class="btn btn-danger">Delete</a>
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