<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get setting data by id
        $setting = Setting::find($id);
        return view('admin.setting.edit', compact('setting'));
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
        //Validate on all data coming from request
        $this->validate($request, [
            'web_name'  => ['string'],
            'web_email' => ['email'],
            'address'   => ['string'],
            'phone_number',
        ]);

        $setting = Setting::find($id);

        // Update
        $setting->update([
            'web_name'      => $request->web_name,
            'phone_number'  => $request->phone_number,
            'web_email'     => $request->web_email,
            'address'       => $request->address
        ]);

        // Redirect to back
        return redirect()->back();
    }

}
