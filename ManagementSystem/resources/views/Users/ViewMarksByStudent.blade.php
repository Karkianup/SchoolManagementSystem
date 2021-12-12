<!DOCTYPE html>
<html lang="en">
<head>
   <title>View Marks</title>
   <link rel="stylesheet" type="text/css" href="/css/userCss/student.css">
</head>
<body>
    @extends('Bootstrap.StudentNavbar')
@section('UserNavbar')
@endsection
    <form action="/viewOwnMarks" method="POST">
        @csrf

       <div class="container ViewOwnMarks">
             <div class="row">
                   <div class="col-4">
                          <select name="examType" class="form-select">
                               <option selected disabled>Choose exam type</option>
                               @foreach ($exams as $exam)
                                   <option value="{{ $exam->exam_code }}">{{ $exam->exam_name }}</option>
                               @endforeach
                         </select>
                    </div>

                    <div class="col-4">
                             <select name="year" class="form-select">
                                  <option value="">year</option>
                                  {{ $year = date('Y') }}
                                  @for ($year = 2016; $year <= 3000; $year++)
                                       <option value="{{ $year }}">{{ $year }}</option>
                                  @endfor
                               </select>
                    </div>

                    <div class="col-2">
                            <input type="submit" value="check" name="checkMarks" class="btn btn-dark">
                </div>
            </div>
            <div class="row">
                <div class="col-8 tableBox">
                      <table border="1px" class="table table-bordered table-hover">
                          <div class="thead" style="background-color:black ">  
                        <tr>
                              <th>Subject Name</th>
                              <th>Marks</th>
                              <th>ExamType</th>
                              <th>Year</th>

                          </tr>
                        </div>

                          <tr>
                              @foreach ($marks as $mark)
                                  <td>{{ $mark->subject_name }}</td>
                                  <td>{{ $mark->marks }}</td>
                                  <td>{{ $mark->exam_name }}</td>
                                  <td>{{ $mark->created_at }}</td>

                                  
                          </tr>
                          @endforeach
                        </table>
                </div>

            </div>
       </div>
        </form>

          
        </body>
</html>












   

  






