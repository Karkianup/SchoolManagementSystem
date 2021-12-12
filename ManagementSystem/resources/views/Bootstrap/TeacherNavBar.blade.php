<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="/css/admincss/index.css">
<style>

/* navbar */
.nav{
     position:absolute;
    width: 100%;
    background-color: #AB0000;
    height:78px;
    }

.nav select{
    height: 41px;
    background-color: #AB0000;
    position: relative;
    left:89%;
    border:none;
    font-family: Georgia, 'Times New Roman', Times, serif;
    font-weight: bold;
    top:12px;
}
.nav select:hover{
    border:2px solid black;

}
/*  sidebar */
.sidebar{
    background-color:#343A50;
    position: absolute;
    height:100%;
    width:172px;
    top:11vh;
    position: fixed;
} 
.sidebar a{
    display:block;
    padding-left:35px;
    padding-top: 21px;
    text-decoration: none;
    color:white;
    font-family:verdana;
    font-weight: bold;
    font-size:17px;
}
.sidebar a:hover{
    background-color: #313647;
    color:white;
    padding: 32px;
 

}
.sidebar h2{
    padding-left:22px ;
    color:black;
    padding-top: 22px;
    font-weight: bold;
    font-family: 'cursive';
}
    </style>
</head>
<body>
    @yield('UserNavbar')

    @extends('Bootstrap.Bootstrap')
    @section('bootstrap')
  @endsection
       
    <div class="nav">
         <select name="logout" onchange="location = this.value;">>
             <option selected disabled>{{ Session::get('fullname') }}</option>
             <option value="logoutUser">Logout</option>
 
         </select>
     </div>
     <div class="sidebar">
         <a href="/homePageUser">Home</a><hr>
         <a href="/Add">Student's Marks</a><hr>
     {{--    <a href="#">Register</a><hr>
         <a href="#">User Profile</a><hr>
         <a href="#">Fee Management</a><hr>
         <a href="#">Exam</a><hr>
 --}}
     </div>

</body>
</html>
