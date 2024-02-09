<?php

namespace App\Http\Controllers;

use App\Models\Skill;
 use App\Http\Requests\UpdateSkillRequest;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::latest()->paginate(15);
         
            return view('skills.show', compact('skills'))
                        ->with('i', (request()->input('page', 1) - 1) * 15);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $this->validate($request, [
            'name' => 'required',
          ]);
        
        $input = $request->all();
        
         Skill::create($input);
        
        // Supposons que vous avez récupéré l'ID des compétences sélectionnées
        // $selectedSkillIds = $request->input('skills'); // Supposons que 'skills' soit le nom du champ dans le formulaire qui contient les compétences sélectionnées
        
        // // Attachez chaque compétence sélectionnée à l'utilisateur
        // $user->skills()->attach($selectedSkillIds);
        
      
        $skills = Skill::latest()->paginate(5);

        return view('skills.show',compact('skills'))->with('success', 'Bienvenue');
    }


    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        //
        return view('skills.edit', compact('skill'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
    
        $skill->update($validatedData);
    
        return redirect()->route('skill.index')
                         ->with('success', 'Skill updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        //
              
        $skill->delete();
         
        return redirect()->route('skill.index')
                        ->with('success','skill deleted successfully');
    }
}
