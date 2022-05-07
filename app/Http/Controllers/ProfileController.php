<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view("profile.index", compact("user"));
    }

    public function setting(){

        $user = Auth::user();
        if($user->profile == null){
            Profile::create([
                'user_id'   => $user->id,
                'image'     => 'default.png',
                'facebook'  => 'https://www.facebook.com',
                'twitter'   => 'https://www.twitter.com',
                'linkedin'   => 'https://www.linkedin.com',
                'about'     => 'About here',
                "age"       => 23,
                "gender"    => "male"
            ]);
        }

        return view('profile.setting', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // dd($request);
        //
        $user = User::find($id);
        $request_data = $request->all();

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

            

            if($request->has('password') && $request->password != null ){
                // Update password
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
            }

            $user->profile->update([
                'image' => $request->image->hashName(),
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'about' => $request->about,
                "age"       => $request->age,
                "gender"    => $request->gender
            ]);


        }else{
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
                "age"       => $request->age,
                "gender"    => $request->gender
            ]);
        }


        if($request->name  != null || $request->email != null ){

            $user->update([
                'name'      => $request->name,
                'email'     => $request->email,
            ]);
        }

        return redirect()->back();

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
