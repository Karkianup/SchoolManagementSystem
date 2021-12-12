<!DOCTYPE html>
<html>
    <head>
        <title>Add new Exams</title>
        <link rel="stylesheet" type="text/css" href="/css/adminCss/index.css">
    </head>
    <body>
        @extends('Bootstrap.Navbar')
        @section('navbar')
        @endsection
        <form action="/addExam" method="POST">
            @csrf 
            <div class="container addNewExams">
              
                <div class="row">
                    <h3 style="color:red;font-family:monospace">Add new Exams</h3>
                    <div class="col-4">
                        @if (session('message'))
                             <div class="alert-danger">{{ session('message') }}</div>
                        
                        @endif
                        <input type="number" name="exam_code" placeholder="enter exam code" class="form-control"><br>
                        <input type="text" name="exam_name" placeholder="enter exam name" class="form-control"><br>
                        <input type="submit" name="submit" value="Add" class="btn btn-primary">

                    </div>
                </div>
            </div>
        </form>
    </body>


</html>