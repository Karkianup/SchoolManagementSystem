<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  @extends('Bootstrap.Bootstrap')
  @section('bootstrap')
  @endsection
<h3 style="color:red;font-family:monospace;text-align:center">Edit Details</h3>
<form action="/update" method="POST">
  @csrf
  @foreach ($users as $user)
              <div class="container" style="position: absolute;left:32%;top:9vh">
                <div class="row">
                   <div class="col-5">
                          <input type="text" name="id" value="{{ $user->id }}" class="form-control" hidden>
                          Usercode:<input type="text" name="usercode" value="{{ $user->usercode }}" class="form-control">
                          fullname:<input type="text" name="fullname" value="{{ $user->fullname }}" class="form-control">
                          email:<input type="text" name="email" value="{{ $user->email }}" class="form-control">
                          password:<input type="text" name="password" value="{{ $user->password}}" class="form-control">
                        
                          class:<input type="text" name="class" value="{{ $user->class }}" class="form-control"><br>
                          <input type="submit" value="update" class="btn btn-success">
        

                   </div>
                </div>

              </div>
@endforeach

</form>
</body>
</html>