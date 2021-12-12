<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add new Subjects</title>
    <link rel="stylesheet" type="text/css" href="/css/adminCss/index.css">
  
</head>
<body>
    @extends('Bootstrap.Navbar')
    @section('navbar')
    @endsection

    <form method="POST" action="/addnewSubjects">
        @csrf
        <div class="container addNewSubjects">
         <div class="row">
            <h3 style="color:red;font-family:monospace">Add new Subject</h3>
            <div class="col-4">
                @if (session('message'))
                    <div class="alert-danger">{{ session('message') }}</div>
                
                @endif
                <input type="number" name="subject_code" placeholder="enter subject code.." value="{{ old('subject_code') }}" class="form-control"><br>
                <input type="text" name="subject_name" placeholder="enter subject name.." value="{{ old('subject_name') }}" class="form-control"><br>
                <input type="number" name="class" placeholder="enter class.." class="form-control">
                @error('class')
                 {{ '*'.$message }} 
                @enderror<br>

                    
                <input type="submit" name="submit" value="Add" class="btn btn-primary">
            </form>
        </div>
    </div>

    </div>
</form>
    
</body>
</html>