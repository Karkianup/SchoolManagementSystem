<!DOCTYPE html>
<html lang="en">
  <head> 
      <link rel="stylesheet" type="text/css" href="/css/userCss/index.css">
  </head>
  <body>
     @extends('Bootstrap.Bootstrap')
     @section('bootstrap')
     @endsection
     
     <form action="/userlogin" method="POST">
         @csrf
     <div class="container UserLogin">
         <div class="row">
             <div class="col-4">
                @if (session('message'))
                        <div class="alert-danger">
                            {{ session('message') }}
                            
                        </div>
                @endif
                       <div class="card-header">
                           <span style="text-align: center;font-family:Georgia, 'Times New Roman', Times, serif;color:black;font-weight:bold">login Here!!!!!</span>
                 </div>
                 <div class="card">
                      <div class="card-body">
                          <div class="card-text">
                              @error('email') {{ "*".$message }} @endif
                                <input type="email" name="email" placeholder="email here" value="{{ old('email') }}" class="form-control"><br>
                              @error('password') {{ "*".$message }} @endif
                                <input type="password" name="password" placeholder="password here"  class="form-control"><br><br>
                                <input type="submit" value="login" class="btn btn-primary"> 
   
                           </div>
                     </div>
                 </div>
              </div>
         </div>
     </div>
     </form>
  </body>
</html>