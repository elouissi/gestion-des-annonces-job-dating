<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Compagnie;
use App\Http\Requests\CompagnieRequest;
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
     
        return view('Announcement.formAnnouncement', compact('compagnies', 'users'));
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
    public function store(Request $request)
    {
        //
        Announcement::create($request->all());
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
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
