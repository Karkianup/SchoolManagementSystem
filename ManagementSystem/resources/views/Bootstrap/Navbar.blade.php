<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="/css/admincss/index.css">
<style>

/* navbar */
.nav{
     position:absolute;
    width: 100%;
    background-color: #E8E8E8;
    height:78px;
    }

.nav select{
    height: 41px;
    background-color: #E8E8E8;
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
    background-color:#A0A0A0;
    position: absolute;
    height:100%;
    width:152px;
    position: fixed;
} 
.sidebar a{
    display:block;
    padding-left:35px;
    padding-top: 21px;
    text-decoration: none;
    color:black;
    font-family:monospace;
    font-weight: bold;
    font-size:17px;
}
.sidebar a:hover{
    background-color: #324F76;
    color:wheat;
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
    @yield('navbar')

    @extends('Bootstrap.Bootstrap')
    @section('bootstrap')
  @endsection
       
    <div class="nav">
        logout:
         <select name="logout" onchange="location = this.value;">>
             <option selected disabled>Admin</option>
             <option value="/logout">Logout</option>
 
         </select>
     </div>
     <div class="sidebar">
         <h2>Admin</h2><hr style="color:Black;height:4px">
         <a href="#">Home</a><hr>
         <a href="/checkprofile">Check Profile</a><hr>
         <a href="/RegisterUser">Register</a><hr>
         <a href="/attendance">Attendance</a><hr>
         <a href="/add">Add</a><hr>
 
     </div>

</body>
</html>
