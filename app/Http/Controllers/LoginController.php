<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateLoginRequest;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('Users.log_in');
    }
    public function register()
    {
        //
        $skills = Skill::latest()->paginate(20);
 
        return view('Users.register',compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);
        
        $input = $request->all();
        
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        
        // Supposons que vous avez récupéré l'ID des compétences sélectionnées
        $selectedSkillIds = $request->input('skills'); // Supposons que 'skills' soit le nom du champ dans le formulaire qui contient les compétences sélectionnées
        
        // Attachez chaque compétence sélectionnée à l'utilisateur
        $user->skills()->attach($selectedSkillIds);
        
        $user->assignRole('student');
        auth()->login($user);
    
        return redirect()->route('form.login')->with('success', 'Bienvenue');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Login::create($request->validated());
        return redirect()->route('Compagnies.index')
                        ->with('success','company created successfully.');
    }
    public function profile(){

        return view('Users.profile');


    } 

    /**
     * Display the specified resource.
     */
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        
        
        $identifiant =['email'=>$email,'password'=>$password];
    
        if(Auth::attempt($identifiant) == "true"){
       
            $request->session()->regenerate();
             return to_route('Compagnies.index')->with('success','welcome to your dashboard');

        }else{

            return back()->withErrors([
                      'email'=>'compte inoutrouvable'
                   ])->onlyInput('email');
        }
    
 

}
    public function logout(){
         Auth::logout();
        return to_route('Compagnies.home');        
    }

    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoginRequest $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Login $login)
    {
        //
    }
}
