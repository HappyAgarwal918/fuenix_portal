<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registration;
use Validator;

class registrationController extends Controller
{
    public function registration()
    {
        $data = registration::get();

        return view('users.registration_form',compact('data'));
    }

    public function registration_submit(Request $request)
    {
        $data = $request->all();

        // echo "<pre>";print_r($data);die;
        if ($request->aadhar_front_) {
            $aadhar_front_name = $request->aadhar_number.'_'.$request->file('aadhar_front_')->getClientOriginalName();
            $aadhar_front = $request->file('aadhar_front_')->move(public_path('registration'), $aadhar_front_name);
        }else{
            $aadhar_front_name = null;
        }

        if ($request->aadhar_back_) {
            $aadhar_back_name = $request->aadhar_number.'_'.$request->file('aadhar_back_')->getClientOriginalName();
            $aadhar_back = $request->file('aadhar_back_')->move(public_path('registration'), $aadhar_back_name);
        }else{
            $aadhar_back_name = null;
        }
        if ($request->signature_) {
            $signature_name = $request->aadhar_number.'_'.$request->file('signature_')->getClientOriginalName();
            $signature = $request->file('signature_')->move(public_path('registration'), $signature_name);
        }else{
            $signature_name = null;
        }

        $data = registration::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'qualification' => $request->qualification,
            'course' => $request->course,
            'duration' => $request->duration,
            'total_fees' => $request->total_fees,
            'aadhar_number' => $request->aadhar_number,
            'aadhar_front' => $aadhar_front_name,
            'aadhar_back' => $aadhar_back_name,
            'signature' => $signature_name,
            'coordinator' => $request->coordinator,
        ]);

        // return redirect('registration/review/'.$data->id ,compact('data'))->with('successful_message','Registration Successfully');

        return view('users.registration_review',compact('data'))->with('successful_message','Registration Successfully');
    }

    public function registration_review($id)
    {
        $data = registration::where('id', $id)->first();

        return view('users.registration_review',compact('data'));
    }
}
