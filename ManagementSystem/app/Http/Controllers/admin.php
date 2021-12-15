<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\facades\DB;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;
use App\Models\exams;
use App\Models\subject;
use App\Models\attendance;
use PDO;
// Hello everyone my name is Anup karki
class admin extends Controller
{
    //from registeruser.blade.php 
    function registerUser(Request $req)
    {
        $req->validate([
            'usercode' => 'required',
            'fullname' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'password' => 'required|min:5'
        ]);

        $user = new User();
        $sql = DB::table('users')
            ->select('email')
            ->where('email', '=', $req->email)->exists();

        if (!$sql == null) {
            return redirect()->back()->with('message', 'email address already exists');
        } else {
            $user = new User();
            $sql = DB::table('users')
                ->select('usercode')
                ->where('usercode', '=', $req->usercode)->exists();

            if (!$sql == null) {
                return redirect()->back()->with('message', 'usercode address already exists');
            } else {
                $user->usercode = $req->usercode;
                $user->fullname = $req->fullname;
                $user->email = $req->email;
                $user->password = $req->password;
                $user->gender = $req->gender;
                $user->class = $req->class;
                $user->usertype = $req->usertype;
                if ($req->hasFile('images')) {
                    $file = $req->file('images');
                    $extension = $file->getClientOriginalExtension();
                    $fileName = time() . '.' . $extension;
                    $file->move("images/", $fileName);
                    $user->image = $fileName;
                }
                $save = $user->save();
                if ($save) {
                    return redirect()->back()->with('message', 'successfully done');
                } else {
                    return redirect()->back()->with('message', 'failed');
                }
            }
        }
    }

    /*from CheckProfile.blade.php */
    function checkProfile(Request $req)
    {
        if ($req->searchButton) {
            $sql = DB::table('users')
                ->select('*')
                ->where('usercode', $req->searchBar)
                ->get();
            return view('Admin.CheckProfile', [
                'users' => $sql,

            ]);
        } else {

            if ($req->usertype == "student") {
                $req->validate([
                    'class' => 'required'
                ]);

                $sql = DB::table('users')
                    ->select('*')
                    ->where('usertype', '=', $req->usertype)
                    ->where('class', $req->class)
                    ->get();

                return view('Admin.CheckProfile', [
                    'users' => $sql,
                ]);
            } else {

                $sql = DB::table('users')
                    ->select('*')
                    ->where('usertype', '=', $req->usertype)
                    ->get();

                return view('Admin.CheckProfile', [
                    'users' => $sql,
                ]);
            }
        }
    }

    //from DeleteFormData.blade.php
    function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
    //from UpdateFormData.blade.php
    function updateUser($id)
    {
        $user = DB::table('users')
            ->select('*')
            ->where('id', '=', $id)
            ->get();
        return view('Admin.EditFormData', [
            'users' => $user,
        ]);
    }
    function update(Request $req)
    {
        $user = User::find($req->id);
        $user->usercode = $req->usercode;
        $user->fullname = $req->fullname;
        $user->password = $req->password;
        $user->class = $req->class;

        $user->save();
        return redirect('/checkprofile');
    }

    // from addNewExams.blade.php
    function addNewExams(Request $req)
    {
        $exams = new exams();
        $sql = DB::table('exams')
            ->select('*')
            ->where('exam_code', '=', $req->exam_code)->exists();
        if (!$sql == null) {
            return redirect()->back()->with('message', "exam code already exists");
        } else {
            $exams->exam_code = $req->exam_code;
            $exams->exam_name = $req->exam_name;
            $save = $exams->save();

            if ($save) {
                return redirect()->back()->with('message', "inserted successfully");
            } else {
                return redirect()->back()->with('message', "insertion failed");
            }
        }
    }

    //from addNewSubjects.blade.php
    function addNewSubjects(Request $req)
    {
        $sql = DB::table('subjects')
            ->select('subject_code')
            ->where('subject_code', '=', $req->subject_code)->exists();
        if (!$sql == null) {
            return redirect()->back()->with('message', 'subject code exists already');
        } else {
            $req->validate([
                'class' => 'required|numeric|between:1,10',

            ]);
            $subject = new Subject();
            $subject->subject_code = $req->subject_code;
            $subject->subject_name = $req->subject_name;
            $subject->class = $req->class;
            $save = $subject->save();
            if ($save) {
                return redirect()->back()->with('message', 'successfully entered');
            } else {
                return redirect()->back()->with('message', 'failed insertion');
            }
        }
    }

    //from Attendance.blade.php
    function insertAttendance(Request $req)
    {
        $req->validate([
            'usercode' => 'required',
            'total_class' => 'required',
            'present_days' => 'required',


        ]);
        $sql = DB::table('users')
            ->select('usercode')
            ->where('usercode', '=', $req->usercode)->exists();

        if (!$sql == null) {
            $attendanceD = DB::table('attendances')
                ->select('*')
                ->where('usercode', '=', $req->usercode)->first();
            if ($attendanceD == null) {


                $at = new attendance(); //calling attendance models
                if ($req->total_class > $req->present_days) {
                    $at->usercode = $req->usercode;
                    $at->total_class = $req->total_class;
                    $at->present_days = $req->present_days;
                    $at->date = $req->attendanceDate;

                    //for absent days
                    $absent_days = ($req->total_class) - ($req->present_days);
                    $at->absent_days = $absent_days;
                    $save = $at->save();
                    if ($save) {
                        return redirect()->back()->with('message', 'successfully Added');
                    } else {
                        return redirect()->back()->with('message', 'failed insertion');
                    }
                } else {
                    return redirect()->back()->with('message', 'present days cannot be greater than Total Class');
                }
            } else {
                return view('Admin.Attendance', [
                    'details' => $attendanceD,
                ])->with('edit', 'student attendance have uploaded already click here to update..');
                //return redirect()->back()->with('edit','student attendance have been uploaded already');

            }
        } else {
            return redirect()->back()->with('message', 'student not registered yet');
        }
    }






    //for editingAttendancedetails
    function editAttendanceDetail($id)
    {
        $sql = DB::table('attendances')
            ->select('*')
            ->where('id', '=', $id)->first();
        return view('Admin.editAttendanceDetail', [
            'edit' => $sql,
        ]);
    }
    function updateAttendanceDetail(Request $req)
    {
        $att = attendance::find($req->id);
        $att->total_class = $req->total_class;
        $att->present_days = $req->present_days;
        $att->usercode = $req->usercode;
        $absent_days = ($req->total_class) - ($req->present_days);
        $att->absent_days = $absent_days;

        $save = $att->save();
        if ($save) {
            return redirect()->route('attendanceForm')->with('message', 'successfully updated');
        } else {
            echo "failed";
        }
    }

    //update Attendance from cardbox without getting id
    function attendanceUpdate(Request $req)
    {
        $sql = DB::table('users')
            ->select('usercode')
            ->where('usercode', '=', $req->usercode)->exists();
        if (!$sql == null) {


            $usercode = $req->usercode;

            $total_class = $req->total_class;
            $present_days = $req->present_days;
            $absent_days = ($req->total_class) - ($req->present_days);
            $a = DB::UPDATE('UPDATE attendances set total_class = ?,present_days = ?,absent_days=? where usercode = ?', [$total_class, $present_days, $absent_days, $usercode]);

            if ($a) {
                return redirect()->back()->with('message', 'Successfully updated');
            }
        } else {
            return redirect()->back()->with('message', 'student doesnot exist');
        }
    }
}
