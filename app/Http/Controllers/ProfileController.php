<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();
    
        // Validate and update user info
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'sex' => 'nullable|in:male,female',
            'birth_place' => 'nullable|string|max:255',
            'booking_date' => 'nullable|date',
            'work' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|max:2048'
        ]);

        // Handle file upload if there's a new profile picture
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }
    
        // Only update the fields that are validated and not null
        $user->update($validated);
    
        // Debugging: Log the data before saving
        \Log::info('User Data to Save: ', $user->toArray());
    
        // Save user info to the database
        $user->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
