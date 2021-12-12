<!doctype html>
<html>
  <head>
     <title>Update Attendance</title>
     <link rel="stylesheet" type="text/css" href="/css/adminCss/index.css">

  </head>
  <body>
    @extends('Bootstrap.Navbar')
    @section('navbar')
    @endsection
   
    <div class="container Atup">
         <div class="row">
                <div class="col-4">
                  <div class="card-header"><h4 style="color:purple;text-align:center">Update Attendance</h4></div>
                  <div class="card">
                    <div class="card-body">
                        <form action="/upAt" method="POST">
                          @csrf
                            <input type="text" name="usercode" placeholder="usercode" class="form-control"><br>
                            <input type="text" name="total_class" placeholder="enter total class" class="form-control"><br>
                            <input type="text" name="present_days" placeholder="enter present days" class="form-control"><br>
                            <input type="submit" value="Update" class="btn btn-dark">
                      
                      
                          </form>
                </div></div>
       </div>
      </div>    </div>
  </body>
</html>