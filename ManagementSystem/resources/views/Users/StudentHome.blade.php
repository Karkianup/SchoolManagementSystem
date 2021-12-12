<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Home</title>
    <link rel="stylesheet" type="text/css" href="/css/userCss/student.css">
</head>
<body>
    @extends('Bootstrap.StudentNavbar')
    @section('UserNavbar')
    @endsection
    <div class="container studentProfile">
        <div class="row">
            <div class="col-4">
                @foreach ($users as $user)
                <img src="{{ asset('images/'.$user->image) }}" style="width:200px;height:200px;border-radius:50%"><br><br>


               <span id="detail"> Usercode:</span>&nbsp;&nbsp;&nbsp;{{ $user->usercode }}<br><hr>
               <span id="detail">fullname:</span>&nbsp;&nbsp;&nbsp;{{ $user->fullname }}<br><hr>
                <span id="detail">email:</span>&nbsp;&nbsp;&nbsp;{{ $user->email }}<br><hr>
                    <span id="detail">gender:</span>&nbsp;&nbsp;&nbsp;{{ $user->gender }}<br><hr>
                    
                @endforeach
            </div>
        </div>
    </div>
   

    
</body>
</html>