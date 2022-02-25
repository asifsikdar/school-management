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
         <p>Employee Registration</p>
      </td>
    </tr>
  </table>

<table id="customers">
  <tr>
    <th width="10%">SL</th>
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Employee Name</b></td>
    <td>{{$details->name}}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Employee Id No</b></td>
    <td>{{$details->id_no}}</td>
  </tr>
  <tr>
    <td>3</td>
    <td><b>Father Name</b></td>
    <td>{{$details->fname}}</td>
  </tr>
  <tr>
    <td>4</td>
    <td><b>Mother Name</b></td>
    <td>{{$details->mname}}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b> Mobile Number</b></td>
    <td>{{$details->mobile}}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Date Of Birth</b></td>
    <td>{{date('d-m-Y',strtotime($details->dob))}}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Address</b></td>
    <td>{{$details->address}}</td>
  </tr>
  <tr>
    <td>8</td>
    <td><b>Gender</b></td>
    <td>{{$details->gender}}</td>
  </tr>
  <tr>
    <td>9</td>
    <td>Religion</td>
    <td>{{$details->religion}}</td>
  </tr>
  <tr>
    <td>10</td>
    <td>Join Date</td>
    <td>{{$details->join_date}}</td>
  </tr>
  <tr>
    <td>11</td>
    <td>Designation</td>
    <td>{{$details['designation']['name']}}</td>
  </tr>
  <tr>
    <td>12</td>
    <td>Salary</td>
    <td>{{$details->salary}}</td>
  </tr>
</table>
<br><br>
<i style="font-size: 10px; float: right;">Print Date : {{date("d M Y")}}</i>

</body>
</html>


