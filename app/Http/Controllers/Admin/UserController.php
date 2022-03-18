<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all users from users table
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // dd($request->has("admin"));
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

        if($request->has("admin")){
            // Attach role
            $user->attachRole('super_admin');
        }else{
            $user->attachRole('moderator');
        }

        // Redirect to home of users
        return redirect()->route('users.index');
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
        return view('admin.users.edit', compact('user'));
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
        // Validate on all data coming from request
        $this->validate($request, [
            "name"  => ['required', 'string'],
            "email" => ['required', 'email'],
            "facebook" => ['nullable'],
            "twitter" => ['nullable'],
            "linkedin" => ['nullable'],
            "about" => ['nullable']
        ]);

        // Except password, permissions, password_confirmation
        $request_data = $request->except(['password', 'password_confirmation', 'permissions']);

        $user = User::find($id);

        // // Update data of user
        // $user->update($request_data);

        // $user->syncPermissions($request->permissions);

        if($request->image && $request->image != null){

            // Delete image from uploads folder
            if($user->profile->image && $user->profile->image != 'default.png'){
                Storage::disk('public_uploads')->delete('/users/' . $user->profile->image);
            }
            // resize the image to a width of 300 and constrain aspect ratio (auto height)
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/users/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();

            $user->update([
                'name'      => $request->name,
                'email'     => $request->email,
            ]);

            if($request->has('password') && $request->password != null ){
                // Update password
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
            }

            $user->syncPermissions($request->permissions);

            $user->profile->update([
                'image' => $request->image->hashName(),
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'about' => $request->about,
            ]);


        }else{
            $user->update([
                'name'      => $request->name,
                'email'     => $request->email,
            ]);

            if($request->has('password') && $request->password != null ){
                // Update password
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
            }

            $user->profile->update([
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'about' => $request->about,
            ]);
        }


        return redirect()->route('users.index');
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
