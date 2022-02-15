<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<table id="customers">
    <tr>
      <td><h2>MY SCHOOL</h2></td>
      <td><h2>My School ERP</h2>
         <p>Address : Mirpur,Dhaka,1206</p>
         <p>Phone :74357456</p>
         <p>Email: support@asifsikder.com</p>
         <p>Website: www.myschool.com</p>
      </td>
    </tr>
  </table>

  @php
   $registrationfee = App\Models\StudentFeeAmount::where('fee_category_id','1')
   ->where('class_id',$details->class_id)->first();
  $originalfee = $registrationfee->amount;
  $discount = $details['discount']['discount'];
  $discounttablefee = $discount/100*$originalfee;
  $finalfee = (float)$originalfee-(float)$discounttablefee;
  @endphp

<table id="customers">
  <tr>
    <th width="10%">SL</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Student Id No</b></td>
    <td>{{$details['student']['id_no']}}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Roll No</b></td>
    <td>{{$details->roll}}</td>
  </tr>
  <tr>
    <td>3</td>
    <td><b>Student Name</b></td>
    <td>{{$details['student']['name']}}</td>
  </tr>
  <tr>
    <td>4</td>
    <td><b>Father's Name</b></td>
    <td>{{$details['student']['fname']}}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Session</b></td>
    <td>{{$details['studentyear']['name']}}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Class</b></td>
    <td>{{$details['studentclass']['name']}}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Registration Fee</b></td>
    <td>{{$originalfee}} $</td>
  </tr>
  <tr>
    <td>8</td>
    <td><b>Discount Fee</b></td>
    <td>{{$discount}} %</td>
  </tr>
  <tr>
    <td>9</td>
    <td><b>Fee For This Student</b></td>
    <td>{{$finalfee}} $</td>
  </tr>
</table>
<br><br>
<i style="font-size: 10px; float: right;">Print Date : {{date("d M Y")}}</i>

</body>
</html>


