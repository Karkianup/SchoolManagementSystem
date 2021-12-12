<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add</title>
    <link rel="stylesheet" type="text/css" href="/css/adminCss/index.css">
</head>
<body>
    @extends('Bootstrap.Navbar')
    @section('navbar')
    @endsection

    <div class="addBox">
        <a href="/addnewExam" id="addnewExam">Add New Exams</a>
        <a href="/addnewSubject" id="addnewSection">Add New Subjects</a>
    </div>
</body>
</html>