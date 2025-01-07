<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\Laravel\Facades\Image;
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

        // Proses gambar jika ada
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'user_' . $user->id . '.' . $file->getClientOriginalExtension();

            // Baca gambar menggunakan Intervention Image
            $image = Image::read($file);

            // Crop gambar berdasarkan input
            $cropX = (int)$request->input('crop_x');
            $cropY = (int)$request->input('crop_y');
            $cropWidth = (int)$request->input('crop_width');
            $cropHeight = (int)$request->input('crop_height');
            
            $image->crop($cropWidth, $cropHeight, $cropX, $cropY);
            
            // Simpan gambar ke storage
            $filePath = 'upload/images/' . $fileName;
            $image->save(storage_path('app/public/' . $filePath));

            // Update path di database
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
