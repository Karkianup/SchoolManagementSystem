<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" type="text/css" href="/css/adminCss/index.css">
</head>
<body>
    @extends('Bootstrap.Bootstrap')
         @section('bootstrap')
    @endsection

    @if(session('message'))
        <div class="error-message">
        {{ session('message') }}

      </div>
    @endif
    <div class="container" id="adminContainer">
       

    <form action="/login" method="POST">
        @csrf
      
          <div class="row">
              <div class="col-4" id="adminForm">
          <h3 style="color:white;text-align:center">Admin Login</h3>

                  <input type="email" name="email" placeholder="email" class="form-control" required><br>
                  <input type="password" name="password" placeholder="password" class="form-control" required><br>
                  <input type="submit" value="login" class="btn btn-primary"><br><br>

              </div>
          </div>
      </div>
    </form>
</body>
</html>