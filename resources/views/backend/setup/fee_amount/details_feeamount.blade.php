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
                      <h3 class="box-title">Student Fee Amount Details</h3>
                      <a href="{{route('student.fee.amount.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student Fee Amount</a>
                  </div>
                  <div class="box-body">
                      <h4><strong>Fee Category :  </strong>{{$detailsdata[0]['fee_category']['name']}}</h4>
                      <div class="table-responsive">
                          <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                              <thead class="thead-light">
                                  <tr>
                                      <th width="5%">SL</th>
                                      <th>Class Name</th>
                                      <th width="25%">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($detailsdata as $key => $details)
                                  <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$details['student_class']['name']}}</td>
                                      <td>{{$details->amount}}</td>
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