<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('profile.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role_id == 1) {
            return view('profile.create');
        }
        return redirect()->route('profile.index')->with('info', "Ooops!Vous n'avez pas l'autorisation de modifier ce compte.");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfileRequest $request)
    {
        if (Auth::user()->role_id == 1) {
            $form = $request->validated();
            $form['password'] = Hash::make($request->password);
            // dd($form);
            Profile::create($form);
            return redirect()->route('profile.index')->with('success', 'Nouveau compte ajouté avec succès');
        };
        return abort(403);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        // dump($profile);
        if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 && $profile->role_id !== 1 ) {
            return view('profile.edit', compact('profile'));
        };
        return redirect()->route('profile.index')->with('info', "Ooops!Vous n'avez pas l'autorisation de modifier ce compte.");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 && $profile->role_id !== 1 ) {
            $profile->fill($request->post())->save();
            return redirect()->route('profile.index')->with('info', 'Le compte a été bien modifié');
        }
        return redirect()->route('profile.index')->with('info', "Ooops!Vous n'avez pas l'autorisation de modifier ce compte.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        if (Auth::user()->role_id == 1) {
            $profile->delete();
            return redirect()->route('profile.index')->with('danger', 'Le compte a été bien supprimé');
        };
        abort(403);
    }
}
