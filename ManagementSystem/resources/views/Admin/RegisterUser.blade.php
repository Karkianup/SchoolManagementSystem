<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/css/adminCss/index.css">
    <script type="text/javascript" src="{{URL::asset('/js/Form.js')}}"></script>
</head>
<body>
    
<div class="container" id="registrationContainer">
<div class="row">
    <div class="col-11">  @if (session('message')) <div class="alert-danger" style="text-align: center">
        {{ session('message') }}</div>
    @endif</div>
</div>
 <div class="row">
    
     <div class="col-11 registrationForm">
      

        <form name="myForm" action="/register" method="POST" enctype="multipart/form-data" onsubmit="return formValidation()">
            @csrf
            <input type="text" name="usercode" placeholder="usercode" value="{{ old('usercode') }}" class="form-control">
            @error('usercode')
            <div class="alert-danger">{{ "*".$message }}</div>
            @enderror<br>
            
            <input type="text" name="fullname" placeholder="Fullname" value="{{ old('fullname') }}"class="form-control">
            @error('fullname')
            <div class="alert-danger">{{ "*".$message }}</div>

            @enderror<br>
   
            
            <input type="email" name="email" placeholder="email" value="{{ old('email') }}" class="form-control">
            @error('email')
            <div class="alert-danger">{{ "*".$message }}</div>

            @enderror<br>
           
            
            <input type="password" name="password" placeholder="Password" value="{{ old('password') }}" class="form-control">
            @error('password') <div class="alert-danger">{{ "*".$message }}</div> @enderror
           <br> Gender:
            male:<input type="radio" name="gender" value="male">&nbsp;&nbsp;&nbsp;&nbsp;
            female:<input type="radio" name="gender" value="female">
            @error('gender') <div class="alert-danger">{{ "*".$message }}</div> @enderror<br>

            <select name="usertype" class="form-select" onchange="showDiv(this)">
                <option selected disabled>choose usertype</option>
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>

            </select><br>

            <div id="hidden_div" style="display:none"><input type="number" name="class" placeholder="Class" value="{{ old('class') }}" class="form-control"><br></div>
            <input type="file" name="images" class="form-control"><hr>
            <input type="submit" value="submit" class="btn btn-success">
    
        </form>

     </div>
 </div>
</div>
<script type="text/javascript" src="/js/Form.js"></script>
@extends('Bootstrap.Navbar')
@section('navbar')
@endsection

   
</body>
</html>