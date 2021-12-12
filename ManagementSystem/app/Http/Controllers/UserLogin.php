<?php

namespace App\Http\Controllers;
use Illuminate\Support\facades\DB;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\facades\session;

class UserLogin extends Controller
{
    //for adminLogin
    function loginAdmin(Request $req){
        $email=$req->email;
        $password=$req->password;


        $admin=DB::table('users')
        ->select('email','password')
        ->where('email','=',$email)
        ->where('usertype','=','admin')->exists();


        if(!$admin==null){
            $admin=DB::table('users')
            ->select('email','password')
            ->where('password','=',$password)
            ->where('usertype','=','admin')->exists();
               if(!$admin==null){
                  return view('Admin.Profile',[
                      'users'=>$admin,
                  ]);

               }else{
                   $message="Wrong password";
                  return redirect('/')->with('message',$message);
               }

        }else{
            $message="Wrong username";
            return redirect('/')->with('message',$message);

        }
        

    }

    //for userLogin
     function userLogin(Request $req){
         $req->validate([
             'email'=>'required',
             'password'=>'required',
         ]);
             $email=$req->email;
            $password=$req->password;

         $user=DB::table('users')
         ->select('*')
         ->where('email','=',$email)
         ->exists();
         if(!$user==null){

         $user=DB::table('users')
            ->select('*')
            ->where('email','=',$email)
            ->where('password','=',$password)
            ->exists();

              if(!$user==null){
                $user=DB::table('users')
                ->select('*')
                ->where('email','=',$email)
                ->where('password','=',$password)
                ->first();


               
                //(['users'=>$user]);
                Session::put('id',$user->id);
                Session::put('usertype',$user->usertype);
                Session::put('fullname',$user->fullname);
            
                if(session()->get('usertype')=="student"){
                   return view('Users.StudentLogin');
                }else if(session()->get('usertype')=="teacher"){
                    return view('Users.TeacherLogin');

                }


              }else{
                return redirect()->back()->with('message','wrong password');

              }
                            }else{
                                 return redirect()->back()->with('message',' wrong username');
              }

     }






















}
