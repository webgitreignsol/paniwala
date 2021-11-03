<?php
    
namespace App\Http\Controllers\Admin\Vendor;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\User;
use DB;
use Hash;
use Auth;
    
class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vendors = User::where('type', 'vendor')->orderBy('id', 'desc')->get();
        return view('admin.vendors.index',compact('vendors'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vendors.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $input['type'] = 'vendor';
        $input['email_verified_at'] = date('Y-m-d H:i:s');
    
        $user = User::create($input);

        Toastr::success('User created successfully.', 'Success');
       	return redirect()->route('vendors.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $vendor = User::find($id);
        return view('admin.vendors.edit',compact('vendor'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        // dd($request->all();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);
    
        $input = $request->all();
        $input['type'] = 'vendor';
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input['password'] = $user->password;   
        }

        $input['updated_by'] = Auth::user()->id;
    
        $user->update($input);
    
        Toastr::success('User updated successfully.', 'Success');
       	return redirect()->route('vendors.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        User::find($id)->delete();
        Toastr::success('Vendor deleted successfully.', 'Success');
       	return redirect()->route('vendors.index');
    }
}