<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::paginate(15);

        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'firstName'=>'required|string',
                'lastName'=>'required|string',
                'birthDate'=>'required|date',
                'telNbr'=>'required|string',
                'address'=>'required|string',
            ]);
            $profile = new Profile([
                'firstName' => $request->get('firstName'),
                'lastName' => $request->get('lastName'),
                'birthDate' => $request->get('birthDate'),
                'telNbr' => $request->get('telNbr'),
                'address' => $request->get('address'),
            ]);
            $profile->save();
            return redirect('/show')->with('success', 'Le profile a bien été ajouté !');
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::where('id', $id)->first();
        return view('profiles.show', ['profile' => $profile]);
    }

    public function show2()
    {
        $id = Auth::user()->id;
        $profile = Profile::where('id', $id)->first();
        return view('profiles.show', ['profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit2($id)
    {
        $profile = Profile::find($id);

        return view('profiles.edit', compact('profile'));
    }

    public function edit()
    {
        $id = Auth::user()->id;
        // $profile = Profile::where('id', $id)->first();
        // return view('profiles.show2', ['profile' => $profile]);

        $profile = Profile::find($id);
        return view('profiles.edit', compact('profile'));
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
        $request->validate([
            'firstName'=>'required|string',
            'lastName'=>'required|string',
            'birthDate'=>'required|date',
            'telNbr'=>'required|string',
            'address'=>'required|string',
        ]);

        $profile = Profile::find($id);
        $profile->firstName = $request->get('firstName');
        $profile->lastName = $request->get('lastName');
        $profile->birthDate = $request->get('birthDate');
        $profile->telNbr = $request->get('telNbr');
        $profile->address = $request->get('address');
        $profile->save();

        return redirect('/show')->with('success', 'Profile bien mis à jour !');
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
