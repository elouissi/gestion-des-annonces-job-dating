<?php

namespace App\Http\Controllers;

use App\Models\Compagnie;
use App\Http\Requests\CompagnieRequest;
use App\Http\Requests\UpdateCompagnieRequest;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;


class CompagnieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $compagnies= compagnie::latest()->paginate(100);
        
        return view('Compagnies.index',compact('compagnies'))
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
        //
    
 
       Compagnie::create($request->validated());
    

  

         
        return redirect()->route('Compagnies.index')
                        ->with('success','Book created successfully.');
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
        return view('Compagnies.edit', compact('compagnies'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompagnieRequest $request, Compagnie $compagnie)
    {
     
      
        $compagnie->update($request->all());
  

         
        return redirect()->route('Compagnies.index')
                        ->with('success','Book created successfully.');

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compagnie $compagnie)
    {
        //
            
        $compagnie->delete();
         
        return redirect()->route('Compagnies.index')
                        ->with('success','Book deleted successfully');
    }
}
