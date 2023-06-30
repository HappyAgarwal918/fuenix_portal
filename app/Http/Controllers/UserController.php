<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInformation;
use App\Models\user_role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    public function employee()
    {
        $role = user_role::get();

        $data['develop'] = User::where('role','2')->leftjoin('user_info','users.id','user_id')->get();
        $data['SEO'] = User::where('role','3')->leftjoin('user_info','users.id','user_id')->get();
        $data['HR'] = User::where('role','4')->leftjoin('user_info','users.id','user_id')->get();

        // echo "<pre>";print_r($data);die;

        return view('employee_info.employee',compact(['role','data']));
    }

    public function employee_form_submit(Request $request)
    {
        try {
            //Validated
            // $validateUser = Validator::make($request->all(), 
            // [
            //     'f_name' => 'required',
            //     'l_name' => 'required',
            //     'email' => 'required|email|unique:users,email',
            // ]);

            // if($validateUser->fails()){
            //     return response()->json([
            //         'status' => false,
            //         'message' => 'validation error',
            //         'errors' => $validateUser->errors()
            //     ], 401);
            // }
            

            $user = User::create([
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);

            if(!empty($user)){

                if ($request->aadhar_front_) {
                    $aadhar_front_name = $request->f_name.'_'.$request->file('aadhar_front_')->getClientOriginalName();
                    $aadhar_front = $request->file('aadhar_front_')->move(public_path('files'), $aadhar_front_name);
                }else{
                    $aadhar_front = null;
                }
                if ($request->aadhar_back_) {
                    $aadhar_back_name = $request->f_name.'_'.$request->file('aadhar_back_')->getClientOriginalName();
                    $aadhar_back = $request->file('aadhar_back_')->move(public_path('files'), $aadhar_back_name);
                }else{
                    $aadhar_back = null;
                }
                if ($request->pan_card_) {
                    $pan_card_name = $request->f_name.'_'.$request->file('pan_card_')->getClientOriginalName();
                    $pan_card = $request->file('pan_card_')->move(public_path('files'), $pan_card_name);
                }else{
                    $pan_card = null;
                }
                if ($request->resume_) {
                    $resume_name = $request->f_name.'_'.$request->file('resume_')->getClientOriginalName();
                    $resume = $request->file('resume_')->move(public_path('files'), $resume_name);
                }else{
                    $resume = null;
                }
                if ($request->degree_certificate_) {
                    $degree_certificate_name = $request->f_name.'_'.$request->file('degree_certificate_')->getClientOriginalName();
                    $degree_certificate = $request->file('degree_certificate_')->move(public_path('files'), $degree_certificate_name);
                }else{
                    $degree_certificate = null;
                }

                $data = UserInformation::create([
                    'user_id' => $user['id'],
                    'gender' => $request->gender,
                    'linkedIn' => $request->linkedIn,
                    'aadhar_number' => $request->aadhar_number,
                    'aadhar_front' => $aadhar_front,
                    'aadhar_back' => $aadhar_back,
                    'pan_number' => $request->pan_number,
                    'pan_card' => $pan_card,
                    'resume' => $resume,
                    'degree_certificate' => $degree_certificate,

                ]);

            }

            return back()->with('successful_message','User Information filled Successfully');

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
