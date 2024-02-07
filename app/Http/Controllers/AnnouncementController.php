<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Compagnie;
use App\Http\Requests\AnnouncementRequest;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $compagnies = Compagnie::latest()->paginate(100);
        $users = User::latest()->paginate(100);
        $skills = Skill::latest()->paginate(20);
        
     
        return view('Announcement.formAnnouncement', compact('compagnies', 'users','skills'));
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
    public function store(AnnouncementRequest $request)
    {
        //
        $form = $request->validated();
         $form['image'] =$request->file('image')->store('announcement','public');
     
        $announcements = Announcement::create($form);
        $selectedSkillIds = $request->input('skills'); // Supposons que 'skills' soit le nom du champ dans le formulaire qui contient les compétences sélectionnées
        
        // Attachez chaque compétence sélectionnée à l'utilisateur
        $announcements->skills()->attach($selectedSkillIds);
         return redirect()->route('Compagnies.index')
        ->with('success','announcement created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        //
        $compagnies = Compagnie::latest()->paginate(100);
        $users = User::latest()->paginate(100);
        $announcements = Announcement::with('user','compagnie')->latest()->paginate(100);
        return view('Announcement.edit', compact('announcement','compagnies','users'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
        $announcement->update($request->all());
        return redirect()->route('Compagnies.index')
                        ->with('success','announcement Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        //
         $announcement->delete();
         
        return redirect()->route('Compagnies.index')
                        ->with('success','announcement deleted successfully');
    }
}
