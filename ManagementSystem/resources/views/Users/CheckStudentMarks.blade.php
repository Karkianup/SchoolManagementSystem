<!DOCTYPE html>
<html lang="en">
<head>
  <title>Check Marks</title>
  <link rel="stylesheet" type="text/css" href="css/userCss/index.css">
</head>
<body>
  @extends('Bootstrap.TeacherNavBar')
  @section('UserNavbar') @endsection
  <form action="/checkMarks" method="POST">
    @csrf
    <div class="container checkStudentMarks">
       <div class="row">
         <div class="col-4">
              <select name="classType" class="form-select">
                <option  selected disabled>Choose class</option>
                <option value="1">One</option> 
                <option value="2">Two</option>
                <option value="3">Three</option> 
                <option value="4">Four</option> 
                <option value="5">Five</option> 
                <option value="6">Six</option> 
                <option value="7">Seven</option> 
                <option value="8">Eight</option> 
                <option value="9">Nine</option> 
                <option value="10">Ten</option> 
              </select>
         </div>
          <div class="col-4">
                <select name="examType" class="form-select">
                    <option selected disabled>Choose exam type</option>
                    @foreach ($exam_names as $exam_name)
                        <option value="{{ $exam_name->exam_code }}">{{ $exam_name->exam_name }}</option>
                    
                    @endforeach
                </select>
          </div>
          <div class="col-2">
             <input type="submit" value="check" name="checkMarks" class="btn btn-dark">
          </div>



       </div>
      </form>
       {{-- for table --}}

       <div class="row">
           <div class="col-8">
@if(isset($_POST['checkMarks']))

              <table border="1px" class="table table-bordered table-hover">

            <tr>
              <th>Student Name</th>
              <th>Usercode</th>
              <th>Subject name</th>
              <th>Marks</th>
              <th>exam Type</th>
              <th>Edit</th>
              <tr>
                <tr>
                @foreach ($marks as $mark)
                <td>{{ $mark->fullname }}</td>
                <td>{{ $mark->usercode }}</td>
                <td>{{ $mark->subject_name }}</td>
                <td>{{ $mark->marks }}</td>
                <td>{{ $mark->exam_name }}</td>
                <td> <a href={{"/editMarks/".$mark->id }} class="btn btn-secondary">Edit</a></td>
        
              </tr>            
              @endforeach
            </table>               
@endif
          </div>
       </div>
   </div>
 

</body>
</html>

 
  
 


   