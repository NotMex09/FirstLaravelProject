<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show a user's profile (if needed)
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Show the edit profile form for the authenticated user
    public function edit()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    // Show the edit form for a specific user (editors)
    public function editUser(User $user)
    {
        // Ensure only editors can access this
        if (Auth::user()->role !== 'manager' && Auth::user()->role !== 'editor') {
            abort(403, 'Unauthorized action.');
        }

        return view('users.edit-user', compact('user'));
    }

    // Show the profile page (if needed)
    public function index()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    // Update the authenticated user's profile
    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
   // Handle profile picture upload
if ($request->hasFile('profile_picture')) {
    $profileImage = $request->file('profile_picture');
    $profileImageName = time() . '.' . $profileImage->getClientOriginalExtension();
    $profileImage->move(public_path('uploads/profile_pictures'), $profileImageName);

    // Save new image path
    $imagePath = 'uploads/profile_pictures/' . $profileImageName;
} else {
    // Keep the old image if no new image is uploaded
    $imagePath = $user->image;
}

// Update user data
$user->fill([
    'name' => $request->name,
    'email' => $request->email,
    'password' => $request->password ? bcrypt($request->password) : $user->password,
    'image' => $imagePath, // Now it correctly updates the image
])->save();


        // Redirect back to the edit page with a success message
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }

    // Update a specific user's role (editors)
    public function updateUserRole(Request $request, User $user)
    {
        // Ensure only editors can access this
        if (Auth::user()->role !== 'manager' && Auth::user()->role !== 'editor') {
            abort(403, 'Unauthorized action.');
        }

        // Validate the request data
        $request->validate([
            'role' => 'required|in:manager,editor,subscriber', // Ensure the role is valid
        ]);

        // Update the user's role
        $user->update([
            'role' => $request->role,
        ]);

        // Redirect back with a success message
        return redirect()->route('dashboard')->with('success', 'User role updated successfully.');
    }

    // Delete a user
    public function destroy(User $user)
    {
        // Ensure only editors can access this
        if (Auth::user()->role !== 'manager' && Auth::user()->role !== 'editor') {
            abort(403, 'Unauthorized action.');
        }

        // Delete the user
        $user->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'User deleted successfully.');
    }


}
