<!DOCTYPE html>
<html lang="en">
<head>
<title>Home Page</title>

    <link rel="stylesheet" type="text/css" href="/css/userCss/index.css">
</head>
<body>
    @extends('Bootstrap.TeacherNavBar')
    @section('UserNavbar')
    @endsection
     
      <div class="container TeacherProfile">
          <div class="row">
              <div class="col-4">
              </div>
          </div>
          <div class="row">
               <div class="col-4">
                   @foreach ($users as $user)
                      <img src="{{'images/'.$user->image }}" style="width:200px;height:200px;border-radius:50%;border:2px solid green"><br><br>

                        <span id="detail">User Code:</span>&nbsp;&nbsp;&nbsp;{{ $user->usercode }}<br><hr>
                        <span id="detail">Name:</span>&nbsp;&nbsp;&nbsp;{{ $user->fullname }}<br><hr>
                        <span id="detail">email:</span>&nbsp;&nbsp;&nbsp;{{ $user->email }}<br><hr>
                        <span id="detail">gender:</span>&nbsp;&nbsp;&nbsp;{{ $user->gender }}<br><hr>
                        <span id="detail"> usertype:</span>&nbsp;&nbsp;&nbsp;{{ $user->usertype }}<br><hr> 
                   @endforeach
                  
               </div>
          </div>
      </div>
    

</body>
</html>