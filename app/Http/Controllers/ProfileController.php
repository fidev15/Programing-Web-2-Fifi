<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first();

        return view('profile', ['profile' => $profile]);
    }

    public function change_avatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|file|mimes:png,jpg|max:2048'
        ]);

        if ($request->hasFile('avatar')) {
            $fileName = time() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->storeAs('uploads', $fileName, 'public');

            $profile = Profile::find($request->id);
            $profile->update([
                'avatar' => $fileName
            ]);

            return redirect()->back()->with('success', 'File berhasil diupload.');
        } else {
            return redirect()->back()->withErrors(['error' => 'File upload gagal.']);
        }
    }
}