@extends('Admin.admin_master')
@section('admin.content')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="box bb-3 border-warning">
                <div class="box-header">
                    <h4 class="box-title">Student <strong>Search</strong></h4>
                </div>

                <div class="box-body">
                    <form method="GET" action="{{route('find.student.class.year')}}">
                       <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Year<span class="text-danger"></span></h5>
                                <div class="controls">
                                  <select name="year_id" id="year_id" required class="form-control">
                                      <option value="" selected="" disabled="">Select Year</option>
                                      @foreach ($years as $year)
                                      <option value="{{$year->id}}" {{(@$year_id == $year->id)? "selected":""}}>{{$year->name}}</option>
                                     @endforeach
                                  </select>
                                </div>
                            </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                  <h5>Class<span class="text-danger"></span></h5>
                                  <div class="controls">
                                    <select name="class_id" id="class_id" required class="form-control">
                                        <option value="" selected="" disabled="">Select Class</option>
                                        @foreach ($classes as $class)
                                        <option value="{{$class->id}}" {{(@$class_id == $class->id)? "selected":""}}>{{$class->name}}</option>
                                       @endforeach
                                    </select>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-4" style="padding-top: 25px;">
                               <input type="submit" class="btn btn-dark mb-5" name="search" value="Search">
                            </div>{{-- end option --}}
                       </div>
                    </form>
                </div>
            </div>
          <div class="col-12">
              <div class="box">
                  <div class="box-header">						
                      <h3 class="box-title">Student List</h3>
                      <a href="{{route('student.registration.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student</a>
                  </div>
                  <div class="box-body">
                      <div class="table-responsive">
                          @if(!@search)
                          <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                              <thead>
                                  <tr>
                                      <th width="5%">SL</th>
                                      <th>Name</th>
                                      <th>Id No</th>
                                      <th>Year</th>
                                      <th>Class</th>
                                      @if (Auth::user()->role == 'Admin')
                                      <th>Code</th>  
                                      @endif
                                      <th>Image</th>
                                      <th width="25%">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($alldata as $key => $value)
                                  <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$value['student']['name']}}</td>
                                      <td>{{$value['student']['id_no']}}</td>
                                      <td>{{$value['studentyear']['name']}}</td>
                                      <td>{{$value['studentclass']['name']}}</td>
                                      <td>{{$value['student']['code']}}</td>
                                      <td>
                                        <img src="{{(!empty($value['student']['image']) ? url('upload/student_image/'.$value['student']['image']) : url('upload/no_image.jpg'))}}" style="width: 100px; height:100px; 
                                        border:1px solid black">
                                      </td>
                                      <td>
                                          <a href="{{route('student.registration.edit',$value->student_id)}}" class="btn btn-info">Edit</a>
                                          <a href="{{route('student.registration.promotion',$value->student_id)}}" class="btn btn-danger">Delete</a>
                                      </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                          @else
                          <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th>Name</th>
                                    <th>Id No</th>
                                    <th>Year</th>
                                    <th>Class</th>
                                    @if (Auth::user()->role == 'Admin')
                                    <th>Code</th>  
                                    @endif
                                    <th>Image</th>
                                    <th width="25%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alldata as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value['student']['name']}}</td>
                                    <td>{{$value['student']['id_no']}}</td>
                                    <td>{{$value['studentyear']['name']}}</td>
                                    <td>{{$value['studentclass']['name']}}</td>
                                    <td>{{$value['student']['code']}}</td>
                                    <td>
                                      <img src="{{(!empty($value['student']['image']) ? url('upload/student_image/'.$value['student']['image']) : url('upload/no_image.jpg'))}}" style="width: 100px; height:100px; 
                                      border:1px solid black">
                                    </td>
                                    <td>
                                        <a href="{{route('student.registration.edit',$value->student_id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{route('student.registration.promotion',$value->student_id)}}" class="btn btn-danger">Promotion</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                          @endif
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