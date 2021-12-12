<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Marks Here</title>
    <link rel="stylesheet" type="text/css" href="/css/userCss/index.css">
</head>
<body>
    @extends('Bootstrap.TeacherNavBar')
    @section('UserNavbar')
    @endsection
    <div class="container UploadMarks">
        <h1>Upload Marks</h1>
        <div class="row">
            <div class="col-4">
               @error('subject_marks') {{ $message }} @enderror
                        <form action="/upload" method="POST">
                            @csrf
                                <input type="text" name="usercode" value="{{ $usercode }}" hidden>
                            
                                @foreach ($subjects as $subject)
                                    <br>{{ $subject->subject_name }}<input type="text" name="subject_code[]" value="{{ $subject->subject_code }}"hidden><br><input type="number" name="subject_marks[]" class="form-control" required> 
                                @endforeach<br>
                            <select name="examtype" class="form-select">
                                      <option selected disabled>Choose exam type</option>
                                @foreach ($exams as $exam)
                                      <option value="{{ $exam->exam_code }}">{{ $exam->exam_name }}</option>
                                @endforeach
                            </select>
                            <br><input type="submit" value="Upload" name="uploadmarks" class="btn btn-dark">
                            </form>

            </div>
        </div>
    </div>
  


</body>
</html>
