<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validating the request
        $validatedData = $request->validate([
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'full_name' => 'required|string',
            'address' => 'required|string',
        ]);

        try {

            // Checking whether user exists before it creates
            if (User::where('email', $validatedData["email"])->exists()) {
                return redirect('auth')->withErrors(['error' => 'User already exists with that email']);
            }

            if (User::where('phone', $validatedData["phone"])->exists()) {
                return redirect('auth')->withErrors(['error' => 'User already with that phone']);
            }

            // Creates a new user
            $user = new User([
                'id' => Str::uuid()->toString(),
                'fullname' => $validatedData["full_name"],
                'email' => $validatedData["email"],
                'password' => $validatedData["password"],
                'address' => $validatedData["address"],
                'phone' => $validatedData["phone"],
            ]);

            // Saving all the user to the database
            $user->save();

            return redirect('auth');
        } catch (QueryException $e) {
            dd('An error has occured while creating a new user', $e);
        }
    }

    public function update(Request $request, $id)
    {
        // 1. Validate input -------------------------------------------
        $validatedData = $request->validate([
            'email'    => 'required|email|unique:users,email,' . $id,
            //'phone'    => 'required|numeric|unique:users,phone,' . $id,
            'full_name' => 'required|string',
            //'address'  => 'required|string',

            // Password is optional
            'password' => [
                'nullable',
                'confirmed',
                Password::min(12)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ]);

        try {

            $user = User::findOrFail($id);

            // Verify current password only if password is being changed
            if ($request->filled('password')) {
                if (!$request->filled('current_password') || !Hash::check($request->current_password, $user->password)) {
                    return back()->withErrors(['current_password' => 'Current password is incorrect.']);
                }

                $user->password = $validatedData['password']; // auto-hashed by model
            }

            // Update fields
            $user->fullname = $validatedData['full_name'];
            $user->email    = $validatedData['email'];

            if ($request->filled('phone')) {
                $request->validate([
                    'phone' => 'numeric|unique:users,phone,' . $id,
                ]);
                $user->phone = $request->phone;
            }

            if ($request->filled('address')) {
                $user->address = $request->address;
            }

            // Optional password change
            if ($request->filled('password')) {
                $user->password = $validatedData['password'];
            }

            $user->save();

            return back()->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update user.']);
        }
    }


    public function profile(Request $request)
    {
        $id = $request->user_id; // Get the currently authenticated user

        try {
            $user = User::findOrFail($id);

            return view('user', compact('user'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update user.']);
        }
    }
}
