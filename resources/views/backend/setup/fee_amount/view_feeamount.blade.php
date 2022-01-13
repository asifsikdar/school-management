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
                      <h3 class="box-title">Student Fee Amount List</h3>
                      <a href="{{route('student.fee.amount.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student Fee Amount</a>
                  </div>
                  <div class="box-body">
                      <div class="table-responsive">
                          <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                              <thead>
                                  <tr>
                                      <th width="5%">SL</th>
                                      <th>Fee Category</th>
                                      <th width="25%">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($alldata as $key => $amount)
                                  <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$amount['fee_category']['name']}}</td>
                                      <td>
                                          <a href="{{route('student.fee.amount.edit',$amount->fee_category_id)}}" class="btn btn-info">Edit</a>
                                          <a href="{{route('student.fee.amount.details',$amount->fee_category_id)}}" class="btn btn-primary">Details</a>
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