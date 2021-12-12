<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Redirector;
use App\Models\exam_results;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use Illuminate\Support\facades\session;
use App\Models\exams;
use App\Models\attendance;
use Carbon\Carbon;

class Users extends Controller
{
    //from TeacherHome.blade.php
    function ProfileDisplay(){
       $sessionId=session()->get('id');
       $user=DB::table('users')
       ->select('*')
       ->where('id','=',$sessionId)
       ->get();
        return view('Users.TeacherHome',[
            'users'=>$user
        ]);
    }

    #From CheckUserCode.blade.php
      function checkUserCode(Request $req){
          $sql=DB::table('users')
          ->select('*')
          ->where('usercode','=',$req->usercode)->exists();
          if(!$sql==null){
              //to select subject
               $subject=DB::table('users')
                 ->join('subjects','users.class','=','subjects.class') 
                 ->select('*')
                 ->where('usercode','=',$req->usercode)->get();
                 //to select exams
                 $exam=DB::table('exams')
                 ->select('*')->get();
                    return view('Users.UploadMarks',[
                        'subjects'=>$subject,
                        'usercode'=>$req->usercode,
                        'exams'=>$exam

                    ]);

          }else{
              return redirect()->back()->with('message','student doesnot exist');
          }

      }

      function uploadMarks(Request $req){
           $check=DB::table('exam_results')
           ->select('*')
           ->where('usercode','=',$req->usercode)
           ->where('exam_code','=',$req->examtype)->exists();
            if($check==null){

    
          $usercode=$req->usercode;
          $subjectCode=$req->subject_code;
          $subjectMarks=$req->subject_marks;
          $examtype=$req->examtype;

          for($i=0;$i<count($subjectCode);$i++){
            $Marks=[  
            'usercode'=>$usercode,
            'subject_code'=>$subjectCode[$i],
            'marks'=>$subjectMarks[$i],
            'exam_code'=>$examtype,
            ];
            $save=DB::table('exam_results')->insert($Marks);
          }
             if($save){
                 return redirect('/cuc')->with('successfull','Successfully inserted');

             }
            }else{
                return redirect('/cuc')->with('successfull','already uploaded marks');

            }

        }
        

        //checkstudentMarks.blade.php
          function displayMarks(Request $req){
              $sql=DB::table('exam_results')
                   ->join('subjects','subjects.subject_code','=','exam_results.subject_code')
                   ->join('exams','exams.exam_code','=','exam_results.exam_code')
                   ->join('users','exam_results.usercode','=','users.usercode')
                   ->where('users.class','=',$req->classType)
                   ->where('exam_results.exam_code','=',$req->examType)

                   ->select('*','exam_results.id')
                   ->get();
                $exam_name=DB::table('exams')
                ->select('*')
                ->get(); 
               return view('Users.CheckStudentMarks',
               [
                   'marks'=>$sql,
                   'exam_names'=>$exam_name,
            ]);
          }
          //to edit Marks of an student
            function editStudentMarks($id){
                $sql=DB::table('subjects')
                ->join('exam_results','exam_results.subject_code','=','subjects.subject_code')
                ->select('*')
                ->where('exam_results.id','=',$id)->get();
                return view('Users.editMarks',[
                    'edits'=>$sql
                ]);

            }

            function updateStudentMarks(Request $req){
                $marks=$req->marks;
                $id=$req->id;
                var_dump($id);
                $sql=DB::update('Update exam_results set marks=? where id=?',[$marks,$id]);
                if($sql){
                    return redirect('/checkMarks')->with('message','Updated Successfully');
                }
            }


        }
    
    