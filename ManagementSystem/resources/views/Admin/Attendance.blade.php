<?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Attendance</title>
    <link rel="stylesheet" type="text/css" href="/css/adminCss/index.css">
</head>
<body>
    @extends('Bootstrap.Navbar')
    @section('navbar')
    @endsection
    <form action="/attendances" method="POST">
        @csrf
        <div class="container addAttendance">
            <div class="row">
                <div class="col-5">
                    <div class="card-header"><h3 style="color:purple;text-align:center;font-weight:bold">Attendance</h3></div>
                    <div class="card">
                          <div class="card-body">
                                @if(session('message'))
                                <div class="alert-danger">
                                {{session('message') }}
                           </div>
                        @else
                        <div class="alert-danger">
                            <a href={{"/editAttendance/".$details->id}}>{{ $edit }}<a></div>
                         @endif           
                               @error('usercode') <div class="alert-danger">{{ "*".$message }}</div> @enderror
                                UserCode:<input type="text" name="usercode" class="form-control" placeholder="Enter Usercode" value="{{old('usercode')}}"><br>
                                @error('total_class') <div class="alert-danger">{{ $message }}</div> @enderror
                                Total class:<input type="number" name="total_class" class="form-control" placeholder="Enter Total class" value="{{old('total_class')}}""><br>

                                @error('present_days') <div class="alert-danger">{{ "*".$message }}</div> @enderror
                                Present Days:<input type="number" name="present_days" class="form-control" placeholder="Enter Present days" value="{{old('present_days')}}"><br>
                                date:<input type="date" name="attendanceDate">
                                 <input type="submit" value="Add" class="btn btn-success">
                                 </form>
                </div>
            </div>
                
                </div>
            </div>
        </div>
        <div class="updateAttendance">
        <div class="card-header"><h4 style="text-align:center;">Update</h4></div>
        <div class="card">
        <div class="card-body">
            <a href="/upAttendance">Update Attendance</a>

        </div>
        </div>
          
        
        </div>
        


</body>
</html>