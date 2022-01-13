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
                      <h3 class="box-title">Assign Subject Details</h3>
                      <a href="{{route('student.assign.subject.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Assign Subject</a>
                  </div>
                  <div class="box-body">
                      <h4><strong>Assign Subject :  </strong>{{$detailsdata[0]['student_class']['name']}}</h4>
                      <div class="table-responsive">
                          <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                              <thead class="thead-light">
                                  <tr>
                                      <th width="5%">SL</th>
                                      <th width="20%">Subject</th>
                                      <th width="20%">Full Mark</th>
                                      <th width="20%">Pass Mark</th>
                                      <th width="20%">Subjective Mark</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($detailsdata as $key => $details)
                                  <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$details['school_subject']['name']}}</td>
                                      <td>{{$details->full_mark}}</td>
                                      <td>{{$details->pass_mark}}</td>
                                      <td>{{$details->subjective_mark}}</td>
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