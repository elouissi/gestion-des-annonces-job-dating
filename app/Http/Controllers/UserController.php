<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('users.show_users', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function show()
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('users.add_user', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('users.Add_user', compact('roles'));
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
            'role_name' => 'required'
        ]);

        $input = $request->all();


        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('role_name'));
        return redirect()->route('users.index')->with('success', 'user created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    // $user = User::find($id);
    // return view('users.show',compact('user'));
    // }
    // /**
    // * Show the form for editing the specified resource.
    // *
    // * @param  int  $id
    // * @return \Illuminate\Http\Response
    // */
    // public function edit($id)
    // {
    // $user = User::find($id);
    // $roles = Role::pluck('name','name')->all();
    // $userRole = $user->roles->pluck('name','name')->all();
    // return view('users.edit',compact('user','roles','userRole'));
    // }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
// */
public function update(Request $request, $id)
{
    // Validation rules
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.$id,
      ]);

    // Retrieve all input data
    $input = $request->all();

 

    // Find user by ID
    $user = User::find($id);

    // Update user with new input data
    $user->update($input);

    // Remove existing roles for the user
    // DB::table('model_has_roles')->where('model_id', $id)->delete();
    DB::table('skills_users')->where('user_id', $id)->delete();

    // Assign new roles to the user
    // $user->assignRole($request->input('roles'));
     
    $selectedSkillIds = $request->input('skills'); // Supposons que 'skills' soit le nom du champ dans le formulaire qui contient les compétences sélectionnées
        
    // Attachez chaque compétence sélectionnée à l'utilisateur
    $user->skills()->attach($selectedSkillIds);
    // Redirect with success message
    return redirect()->route('profile')
                     ->with('success', 'vous avez mofier correctement');
}

    // /**
    // * Remove the specified resource from storage.
    // *
    // * @param  int  $id
    // * @return \Illuminate\Http\Response
    // */
    // public function destroy(Request $request)
    // {
    // User::find($request->user_id)->delete();
    // return redirect()->route('users.index')->with('success','تم حذف المستخدم بنجاح');
    // }
}
