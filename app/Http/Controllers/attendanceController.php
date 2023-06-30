<?php

namespace App\Http\Controllers;
use App\Models\attendance;
use App\Models\User;
use App\Models\total_attendance_days;
use Carbon\Carbon;

use Illuminate\Http\Request;

class attendanceController extends Controller
{
    public function attendance(Request $request)
    {
        if ($request->startMonth && $request->endMonth) {
            $startMonth = $request->startMonth->format("Y-m-d");
            $endMonth = $request->endMonth->format("Y-m-d");
        }else{
            $startMonth = Carbon::now()->day(1)->format("Y-m-d");
            $endMonth = Carbon::now()->endOfMonth()->format("Y-m-d");
        }

        $total_days_ = total_attendance_days::whereBetween('date',[$startMonth,$endMonth])->select('days')->first();
        // echo "<pre>";print_r($total_days_);die();

        attendance::whereBetween('date',[$startMonth,$endMonth])
                ->count();

        $user = User::leftjoin('user_role','users.role','user_role.id')
                    ->select('users.*','user_role.id as user_role_id','user_role.role_name as role_name')
                    ->get();

        foreach ($user as $key)
        {
            $data[$key->role_name][$key->f_name]['id'] = $key->id;
            $data[$key->role_name][$key->f_name]['total_days'] = $total_days_['days'];
            $data[$key->role_name][$key->f_name]['absent'] = attendance::where('user_id', $key->id)
                                ->where('attendance',0) // 0 is for absent
                                ->whereBetween('date',[$startMonth,$endMonth])
                                ->count();
            $data[$key->role_name][$key->f_name]['present'] = attendance::where('user_id', $key->id)
                                ->where('attendance',1) // 1 is for present
                                ->whereBetween('date',[$startMonth,$endMonth])
                                ->count();
            $data[$key->role_name][$key->f_name]['leave'] = attendance::where('user_id', $key->id)
                                ->where('attendance',2) // 2 is for leave
                                ->whereBetween('date',[$startMonth,$endMonth])
                                ->count();
        }
        echo "<pre>";print_r($data);die;

        return view('attendance.attendance',compact('data'));
    }

    public function attendance_detail(Request $request, $id)
    {
        if ($request->startMonth && $request->endMonth) {
            $startMonth = $request->startMonth->format("Y-m-d");
            $endMonth = $request->endMonth->format("Y-m-d");
        }else{
            $startMonth = Carbon::now()->day(1)->format("Y-m-d");
            $endMonth = Carbon::now()->endOfMonth()->format("Y-m-d");
        }
        $total_days_ = total_attendance_days::whereBetween('date',[$startMonth,$endMonth])->select('days')->first();

        $data = attendance::where('user_id', $id)
                ->whereBetween('date',[$startMonth,$endMonth])
                ->leftjoin('users','attendance.user_id','users.id')
                ->leftjoin('user_role','users.role','user_role.id')
                ->get();

        $data['total_days'] = $total_days_['days'];

        $data['absent'] = attendance::where('user_id', $id)
                ->where('attendance',0)                         // 0 is for absent
                ->whereBetween('date',[$startMonth,$endMonth])
                ->count();

        $data['present'] = attendance::where('user_id', $id)
                ->where('attendance',1)                         // 1 is for present
                ->whereBetween('date',[$startMonth,$endMonth])
                ->count();

        $data['leave'] = attendance::where('user_id', $id)
                ->where('attendance',2)                         // 2 is for leave
                ->whereBetween('date',[$startMonth,$endMonth])
                ->count();
        // echo "<pre>";print_r($data);die;
        
        return view('attendance.attendance_detail',compact('data'));
    }
}
