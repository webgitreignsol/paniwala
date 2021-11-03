<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\User;
use DB;
use Hash;
use Auth;


class AdminController extends Controller
{
    

    public function index(Request $request)
    {
        $admins = User::where('type', 'admin')->orderBy('id', 'desc')->get();
        return view('admin.admin.index',compact('admins'));
    }


    public function create()
    {
        return view('admin.admin.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['added_by'] = Auth::user()->id;
        $input['type'] = 'admin';
        $input['email_verified_at'] = date('Y-m-d H:i:s');
    
        $user = User::create($input);

        Toastr::success('Admin created successfully.', 'Success');
       	return redirect()->route('admins.index');
    }



    public function edit($id)
    {
    
        $admin = User::find($id);
        return view('admin.admin.edit',compact('admin'));
    }



    public function update(Request $request, $id)
    {
        $user = User::find($id);

        // dd($request->all();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);
    
        $input = $request->all();
        $input['type'] = 'admin';
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input['password'] = $user->password;   
        }

        $input['updated_by'] = Auth::user()->id;
    
        $user->update($input);
    
        Toastr::success('Admin updated successfully.', 'Success');
       	return redirect()->route('admins.index');
    }


     public function destroy($id)
    {
       
        User::find($id)->delete();
        Toastr::warning('Admin deleted successfully.', 'Success');
       	return redirect()->route('admins.index');
    }
}
