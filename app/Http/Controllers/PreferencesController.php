<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Preferences;

class PreferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $preferences = Preferences::where('user_id', $user->id)->get();
        return view('preferences.index', compact('preferences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $preference = auth()->user()->preferences ?? new Preferences;

        return view('preferences.edit', compact('preference'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vegetarian' => 'nullable|boolean',
            'vegan' => 'nullable|boolean',
            'nut_allergy' => 'nullable|boolean',
            'lactose_intolerance' => 'nullable|boolean',
            'gluten_intolerance' => 'nullable|boolean',
            'bio_food' => 'nullable|boolean',
            'local_food' => 'nullable|boolean',
            'favorite_food' => 'nullable|string|max:255',
        ]);

        $user = auth()->user();
        // Retrieve the authenticated user's preferences or create a new instance
        if(auth()->user()->preferences) {
            $preference = $user->preferences;
            $preference->update($validatedData);
        } else {
            $preference = new Preferences();
            $preference->fill($validatedData);
            $user->preferences()->create($validatedData);
        }

        return view('preferences.edit', compact('preference'));
    }


    public function show(Preferences $preferences)
    {

        return view('preferences.edit', compact('preferences'));
    }

    public function edit()
    {
        $user = auth()->user();
        $preference = $user->preferences;

        return view('preferences.edit', compact('preference'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
