<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLogin;
use App\Http\Controllers\admin;
use App\Http\Controllers\Users;
use App\Http\Controllers\Student;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::view('/session','Users.session');
route::view('/StudentLogin','Users.StudentLogin');
route::view('/','Admin.Form');#for admin login
route::view('/UserLogin','Users.UserLogin');
route::view('/addnewExam','Admin.addNewExams');
route::post('/addExam',[admin::class,'addNewExams']);

route::get('/UserLogin',function(){
    if(session()->get('usertype')=="student"){
        return view('Users.StudentLogin');
    }else if(session()->get('usertype')=="teacher"){
        return view('Users.TeacherLogin');
    }else{
        return view('Users.UserLogin');

    }});

route::get('/logoutUser',function(){
    if(session()->has('id')| session()->has('usertype')){
       session()->flush();
        return redirect('/UserLogin');

    }

});
route::view('teacherProfile','Users.TeacherProfile');
route::view('/adminProfile','Admin.Profile');
route::view('/RegisterUser','Admin.RegisterUser');
route::view('/checkprofile','Admin.CheckProfile');
route::view('/EditFormData','Admin.EditFormData');
route::post('/checkprofile',[admin::class,'checkProfile']);
route::get('/DeleteFormData/{id}',[admin::class,'deleteUser']);//for deleting studentProfile
route::get('/EditFormData/{id}',[admin::class,'updateUser']);//for editing formData
route::post('/login',[UserLogin::class,'loginAdmin']);
route::post('/register',[admin::class,'registerUser']);

route::post('/update',[admin::class,'update']);
route::post('/userlogin',[UserLogin::class,'userLogin']);

route::get('/logout',function(){
return redirect('/');
});

route::view('/homePageUser','Users.TeacherHome');
route::get('/homePageUser',[Users::class,'ProfileDisplay']);//for displaying teacher Profile

route::view('/add','Admin.Add');

route::view('/addnewSubject','Admin.addNewSubjects');
route::post('/addnewSubjects',[admin::class,'addNewSubjects']);
//For admin

//For Users
route::view('/Add','Users.Add');#from Users/Add.blade.php

route::view('/cuc','Users.CheckUserCode');
route::post('/uploadmarks',[Users::class,'checkUserCode']);//to check UserCode
route::post('/upload',[Users::class,'uploadMarks']);//to check UserCode



//for student Attendance
route::view('/attendance','Admin.Attendance')->name('attendanceForm');
route::post('/attendances',[Admin::class,'insertAttendance']);

//for student profile display
route::view('/studentHome','Users.StudentHome');
route::get('/studentHome',[Student::class,'studentProfile']);

route::view('/editAttendance','Admin.editAttendanceDetail');
route::get('/editAttendance/{id}',[admin::class,'editAttendanceDetail']);//for editing attendanceDetail

route::post('/editAttendances',[admin::class,'updateAttendanceDetail']);

//for updating attendance
route::view('/upAttendance','Admin.UpdateAttendance');
route::post('/upAt',[admin::class,'attendanceUpdate']);

//for shwoing attendance
route::get('/showAttendance',[Student::class,'showAttendance']);


//for checking studentMarks
route::view('/checkMarks','Users.CheckStudentMarks');
route::post('/checkMarks',[Users::class,'displayMarks']);
route::get('/checkMarks',[Users::class,'displayMarks']);

//to edit studentMarks
route::get('/editMarks/{id}',[Users::class,'editStudentMarks']);
route::post('/editStudentMarks',[Users::class,'updateStudentMarks']);

//for student to view their marks(from ViewMarksByStudent.blade.php)
route::view('/viewOwnMarks','Users.ViewMarksByStudent');
route::get('/viewOwnMarks',[Student::class,'viewOwnMarks']);
route::post('/viewOwnMarks',[Student::class,'viewOwnMarks']);



