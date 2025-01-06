<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\Profile\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function editPassword()
    {
        return view('profile.partials.update-password');
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = $request->user();

        // Isi data pengguna dari input yang divalidasi
        $user->fill($request->validated());

        // Proses file gambar jika ada
        if ($request->hasFile('image')) {
            // // Hapus file lama jika ada
            // if ($user->image && Storage::exists('public/upload/images' . $user->image)) {
            //     Storage::delete('public/upload/images' . $user->image);
            // }

            $fileName = 'user_' . $user->id . '.' . $request->file('image')->getClientOriginalExtension();

            // Simpan file ke direktori public/storage/upload/images
            $filePath = $request->file('image')->storeAs('upload/images',$fileName, 'public');

            // Simpan path ke kolom image di database
            $user->image = $filePath;
        }

        // Simpan data pengguna
        $user->save();

        return redirect()->route('profile.setting')->with('success', 'Berhasil update');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'Password berhasil di update');
    }
}
