<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all users from users table
        // $users = User::all();
        $passengers = User::with('roles')->whereHas('roles', function($q)
        {
            $q->whereIn('name', ['passenger']);
        })->get();
        

        return view('admin.passengers.index', compact('passengers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.passengers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate on all data coming from request
        $this->validate($request, [
            'name'  => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        // Except password, permissions, password_confirmation
        $request_data = $request->except(['password', 'password_confirmation']);
        $request_data['password'] = Hash::make($request->password);

        // Save new user
        $user = User::create($request_data);

        // create profile user
        if($user->profile == null){
            Profile::create([
                'user_id'   => $user->id,
                'image'     => 'default.png',
                'facebook'  => 'https://www.facebook.com',
                'twitter'   => 'https://www.twitter.com',
                'linkedin'  => 'https://www.linkedin.com',
                'about'     => 'About here',
                "age"       => 23,
                "gender"    => "male"
            ]);
        }
        // Attach role
        $user->attachRole('passenger');

        // Redirect to home of users
        return redirect()->route('passengers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.passengers.edit', compact('user'));
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
        $user = User::find($id);
        // dd($user->roles);
        $user->detachRoles($user->roles); 

        // Update data of user
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        // Attach role
        $user->attachRole('passenger');

        // Redirect to home of users
        return redirect()->route('passengers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        // Delete image from uploads folder
        if($user->profile->image != 'default.png'){
            Storage::disk('public_uploads')->delete('/users/' . $user->profile->image);
        }
        $user->delete();
        return redirect()->back();
    }
}
