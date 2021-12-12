<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Attendance Detail</title>
    <link rel="stylesheet" type="text/css" href="/css/adminCss/index">

</head>
<body>
@extends('Bootstrap.Navbar')
@section('navbar')
@endsection
    <form action="/editAttendances" method="POST">
        @csrf
        <div class="container editAttendance">
            <div class="row">
                <div class="col-4">
                   <div class="card">
                        <div class="card-header"><h3 style="text-align:center;color:purple;">Update Attendance</h3></div>
                            <div class="card-body">
                                    <input type="text" name="id" value="{{$edit->id }}" class="form-control" hidden>
                                    <input type="text" name="usercode" value="{{ $edit->usercode }}" class="form-control" hidden>
                                    Total class:<input type="number" name="total_class" class="form-control"><br>
                                    Present Days<input type="number" name="present_days" class="form-control"><br>
                                    <input type="submit" value="update" class="btn btn-dark">

                             </div>
                     </div>
                </div>
            </div>
        </div>



    </form>
</body>
</html>