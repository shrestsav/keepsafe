<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserDetail;
use App\Role;
use DB;
use Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name','id');
        return view('users.create',compact('roles')); //return the view with the list of roles passed as an array
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'roles' => 'required'
        ]);
        $input = $request->only('name', 'email', 'password');
        $input['password'] = Hash::make($input['password']); //Hash password
        $user = User::create($input); //Create User table entry
        //Attach the selected Roles
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        return redirect()->route('users.index')
            ->with('success','User created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get(); //get all roles
        $userRoles = $user->roles->pluck('id')->toArray();
        return view('users.edit',compact('user','roles','userRoles'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'confirmed',
            'roles' => 'required'
        ]);
        $input = $request->only('name', 'email', 'password');
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']); //update the password
        }else{
            $input = array_except($input,array('password')); //remove password from the input array
        }
        $user = User::find($id);
        $user->update($input); //update the user info
        //delete all roles currently linked to this user
        DB::table('role_user')->where('user_id',$id)->delete();
        //attach the new roles to the user
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->back()
            ->with('success','User deleted successfully');
    }

    public function staffs()
    {
        $staffs = User::all();
        return view('staffs.index', compact('staffs'));
    }

    public function listStaffs()
    {
        $staffs = User::whereHas('roles', function ($query) {
                          $query->where('name', '=', 'staff');
                        })
                        ->with('details')
                        ->get();
        return $staffs;
    }

    public function create_staff(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $request['password'] = Hash::make($request->password); //Hash password
        $createUser = User::create($request->all()); //Create User table entry

        if($createUser){
            $request['user_id'] = $createUser->id; // Get User ID
            $createUserDetails = UserDetail::create($request->all());

            //Attach the Staff Role
            $role_id = Role::where('name','staff')->first()->id;
            if($role_id)     
                $createUser->attachRole($role_id);
        }

        return 'done';
    }
}
