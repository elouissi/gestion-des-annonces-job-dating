<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\UpdateLoginRequest;
use Illuminate\Http\Request;
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoginRequest $request)
    {
        //
        Login::create($request->validated());
        return redirect()->route('Compagnies.index')
                        ->with('success','company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        
    //     $identifiant =['email'=>$email,'password'=>$password];
    //     dd(Auth::attempt($identifiant));
    // 
    $user = login::where('email', $email)->first();

    // Vérifier si le mot de passe fourni correspond au mot de passe stocké
    if ($user && $password === $user->password) {
        // Mot de passe correct
        $request->session()->regenerate();
        return to_route('Compagnies.index')->with('success','welcome to your dashboard');;
     } else {
        // Mot de passe incorrect
        return back()->withErrors([
            'email'=>'compte inoutrouvable'
        ])->onlyInput('email');
     }

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
