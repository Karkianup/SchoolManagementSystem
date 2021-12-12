<!DOCTYPE html>
<html lang="en">
<head>
    <style>
         .editMarks{
             position: absolute;
             top:22vh;left:35%;
         }
        </style>
</head>
<body>
    @extends('Bootstrap.TeacherNavBar')
    @section('UserNavbar') @endsection 

    @if(session('message')) <div class="alert-danger">{{ session('message') }} @endif </div>
  
    <form action="/editStudentMarks" method="POST">
        @csrf
        <div class="container editMarks">
            <div class="row">
                <div class="col-4">
                    @foreach ($edits as $edit)
                        
                    <h3 style="text-align: center;color:purple;font-weight:bold">Edit Marks</h3>
                    <input type="text" name="id" value={{ $edit->id }} class="form-control" hidden><br>
                    <input type="text" name="usercode" value={{ $edit->usercode }} class="form-control" readonly><br>
                    {{ $edit->subject_name }}<input type="text" name="marks" value={{ $edit->marks }} class="form-control"><br>
                    @endforeach

                    <input  type="submit" value="update" class="btn btn-dark">
                </div>
            </div>
        </div>
          
    
    </form>

    
</body>
</html>