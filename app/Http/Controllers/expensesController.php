<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\expenses;
use Validator;
use Auth;

class expensesController extends Controller
{
    public function expenses()
    {
        $data = expenses::where('user_id', auth::user()->id)->get();

        return view('expenses.expenses',compact('data'));
    }

    public function add_expense(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data,[
            'name' => 'required',
            'amount' => 'required',
            'user_id' => 'required',
        ]);

        if ($validator->passes())
        {
            $user = expenses::create($data);
        }
        
        return response($user);

    }
}
