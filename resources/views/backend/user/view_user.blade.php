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
                      <h3 class="box-title">User List</h3>
                      <a href="{{route('user.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add User</a>
                  </div>
                  <div class="box-body">
                      <div class="table-responsive">
                          <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                              <thead>
                                  <tr>
                                      <th width="5%">SL</th>
                                      <th>Role</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th width="25%">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($alldata as $key => $user)
                                  <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$user->usertype}}</td>
                                      <td>{{$user->name}}</td>
                                      <td>{{$user->email}}</td>
                                      <td>
                                          <a href="{{route('user.edit',$user->id)}}" class="btn btn-info">Edit</a>
                                          <a href="{{route('user.delete',$user->id)}}" class="btn btn-danger">Delete</a>
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