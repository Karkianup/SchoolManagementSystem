<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/css/adminCss/index.css">
    <script type="text/javascript" src="/js/Form.js"></script>
</head>
<body>
    @extends('Bootstrap.Navbar')
    @section('navbar')
    @endsection

    <form action="/checkprofile" method="POST">
        @csrf

     
        <div class="searchBar">
             <input type="text" name="searchBar">
             <input type="submit" value="search" name="searchButton">
        </div>
        <div class="container CheckProfileContainer ">
                <div class="row">
                    <div class="col-6">
                        @error('class')
                             <div class="alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div><br>
    
                <div class="row">
                    <div class="col-3">
                        <select name="usertype" class="form-select" onchange="showDiv(this)">
                                <option selected disabled>Choose usertype</option>
                                <option value="student">student</option>
                                <option value="teacher">teacher</option>

                        </select>
                   </div>
                   <div class="col-3">
                    <div id="hidden_div" style="display: none">
                    <select name="class" class="form-select">
                            <option selected disabled>Choose class</option>
                            <option value="1">One</option>
                            <option value="2">two</option>
                            <option value="3">three</option>
                            <option value="4">four</option>
                            <option value="5">five</option>
                            <option value="6">six</option>
                            <option value="7">seven</option>
                            <option value="8">eight</option>
                            <option value="9">nine</option>
                            <option value="20">ten</option>
                        </select>
                        </div>
                    </div>
               
                        <div class="col-2">
                            <input type="submit" value="submit" name="checkUserProfile" class="btn btn-success">

                 </div>
                </div>

    </div>
    </form>
    <div class="row">
            <div class="col-5 checkProfileTable" >
                @if(isset($_POST['checkUserProfile'])|isset($_POST['searchButton']))
                <table border=1px class="table table-bordered table-hover">
                    <tr>
                        <th>usercode</th> 
                        <th>image</th> 
                        <th>fullname</th> 
                        <th>email</th> 
                        <th>password</th> 
                        <th>gender</th> 
                        <th>class</th> 
                        <th>usertype</th>
                        <th>edit</th>
                        <th>Delete</th>
    
    
                    </tr>


                    <tr>
                  

                        @foreach ($users as $user)
                            <td>{{ $user->usercode }} </td>
                            <td><img src="{{ asset('images/'.$user->image) }}" style="height:120px;width:120px"> </td>
                            <td>{{ $user->fullname }} </td>
                            <td>{{ $user->email }} </td>
                            <td>{{ $user->password }} </td>
                            <td>{{ $user->gender }} </td>
                            <td>{{ $user->class }} </td>
                            <td>{{ $user->usertype }} </td>
                            <td><a href={{"/EditFormData/".$user->id}} class="btn btn-success">Edit</a></td>
                            <td><a href={{ "/DeleteFormData/".$user->id }} class="btn btn-danger">Delete </a></td>
                           
                        </tr>

                        @endforeach

                   
        
                
                </table>
       @endif  
                
            </div>
    </div>
</div>


</body>
</html>