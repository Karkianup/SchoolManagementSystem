<!DOCTYPE html>
<html lang="en">
<head>
    <title>Check User Code</title>
    <link rel="stylesheet" type="text/css" href="/css/userCss/index.css">
</head>
<body>
    @extends('Bootstrap.TeacherNavBar')
    @section('UserNavbar')
    @endsection
    <div class="container checkStudentUserCode">
        <div class="row">
            <div class="col-4">
                @if (session('successfull'))
                <div class="alert-danger">{{ session('successfull') }}</div>
                @endif
            </div>
        </div>
       
        <div class="row">
            <h1 style="color:purple;font-family:cursive">Search Using UserCode</h1>
            <div class="col-4">
                @if (session('message'))
                  <div class="alert-danger">{{ session('message') }}</div>
                @endif
                   <form action="/uploadmarks" method="POST">
                        @csrf 
                        <input type="text" name="usercode" placeholder="enter usercode" class="form-control"><br>
                        <input type="submit" value="submit" class="btn btn-dark">
                    
                    </form>

            </div>
        </div>
    </div>
</body>
</html>

