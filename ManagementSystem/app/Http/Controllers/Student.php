<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use Illuminate\Support\facades\session;
use Carbon\Carbon;
use App\Models\exam_results;


class Student extends Controller
{
    
    function studentProfile(){
        $id=session()->get('id');
        $user=DB::table('users')
        ->select('*')
        ->where('id','=',$id)
        ->get();
        return view('Users.StudentHome',[
            'users'=>$user
        ]);

    }

    function showAttendance(){
         $sessionId=Session::get('id');
        
            $sql=DB::table('users')
            ->join('attendances','users.usercode','=','attendances.usercode')
            ->select('*')
            ->where('users.id','=',$sessionId)->first();
            if(!$sql==null){

            return view('Users.ShowAttendance',['attendance'=>$sql]);
            }else{

                return redirect()-back()->with('message','attendance have not been updated');


            }
         
    }
     function viewOwnMarks(Request $req){
         $sessionId=session()->get('id');
         //for exam_marks
         $sql=DB::table('exam_results')
         ->join('subjects','exam_results.subject_code','=','subjects.subject_code')
         ->join('exams','exam_results.exam_code','=','exams.exam_code')
         ->join('users','exam_results.usercode','=','users.usercode')
          ->select('*')
          ->where('exam_results.exam_code','=',$req->examType)
          ->whereYear('exam_results.created_at','=',$req->year)
          ->where('users.id','=',$sessionId)
         ->get();

         //for user inforamtion
         $users=DB::table('exam_results')
         ->join('subjects','exam_results.subject_code','=','subjects.subject_code')
         ->join('exams','exam_results.exam_code','=','exams.exam_code')
         ->join('users','exam_results.usercode','=','users.usercode')
          ->select('*')
          ->where('users.id','=',$sessionId)
          ->first();

           //for exam name in select option
           $exams=DB::table('exams')
           ->select('*')
           ->get();

             $date=DB::table('exam_results')
             ->selectRaw('created_at AS year ')->first();
          
           return view('Users.ViewMarksByStudent',[
                'marks'=>$sql,
                'exams'=>$exams,
                'users'=>$users,
                'y'=>$date,
            ]);
     }



}
