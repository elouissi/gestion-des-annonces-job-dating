<?php

namespace App\Http\Controllers;

use App\Models\Compagnie;
use App\Models\Announcement;
use App\Http\Requests\CompagnieRequest;
use App\Http\Requests\UpdateCompagnieRequest;
use Illuminate\Support\Facades\DB;

class CompagnieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compagnies = Compagnie::latest()->paginate(100);
        $applyments = Announcement::with('user', 'compagnie', 'users')->latest()->paginate(100);
        $user = auth()->user(); // Récupérer l'utilisateur actuel, par exemple via l'authentification
        $userApplyments = $user->users()->with('compagnie')->get();
        // Boucle à travers les applyments pour obtenir les noms des annonces
        foreach ($applyments as $applyment) {
            foreach ($applyment->users as $user) {
                $announcementName = Announcement::find($user->pivot->announcement_id)->title;
                $user->announcement_name = $announcementName;
            }
        }
    
        return view('Compagnies.index', compact('compagnies', 'applyments','userApplyments'))
                    ->with('i', (request()->input('page', 1) - 1) * 100);
    }
    
    public function home()
    {
        //
     
            $compagnies = Compagnie::latest()->paginate(100);
            $announcements = Announcement::with('user','compagnie')->latest()->paginate(100);
            if (auth()->check()) {
            $userSkills = auth()->user()->skills->pluck('id');
            $halfSkillsCount = $userSkills->count() / 2;
            $announcementsfilter = Announcement::whereExists(function ($query) use ($userSkills, $halfSkillsCount) {
                $query->select(DB::raw(1))
                      ->from('skills')
                      ->join('skills_announcements', 'skills.id', '=', 'skills_announcements.skill_id')
                      ->whereColumn('announcements.id', 'skills_announcements.announcement_id')
                      ->whereIn('skills.id', $userSkills)
                      ->groupBy('skills_announcements.announcement_id')
                      ->havingRaw('COUNT(*) >= ?', [$halfSkillsCount]);
            })->whereNull('announcements.deleted_at')->get();
        }else{
                        $announcementsfilter = Announcement::with('user','compagnie')->latest()->paginate(100);

        }

 
        
            return view('Home', compact('compagnies', 'announcements','announcementsfilter'))
                        ->with('i', (request()->input('page', 1) - 1) * 100);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view('Compagnies.formCompagine');  

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompagnieRequest $request)
    { 
        Compagnie::create($request->validated());
        return redirect()->route('Compagnies.index')
                        ->with('success','company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Compagnie $compagnie)
    {
        //
        return view('Compagnies.show',compact('compagnies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compagnie $compagnie)
    {
        //
         return view('Compagnies.edit', compact('compagnie'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompagnieRequest $request, Compagnie $compagnie)
    {
        $compagnie->update($request->validated());
        return redirect()->route('Compagnies.index')
                        ->with('success','Company Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compagnie $compagnie)
    {
        //
             
        $compagnie->delete();
         
        return redirect()->route('Compagnies.index')
                        ->with('success','Company deleted successfully');
    }
}
