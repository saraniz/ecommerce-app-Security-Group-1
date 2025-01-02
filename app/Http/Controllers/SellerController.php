<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class SellerController extends Controller
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
            'store_name' => 'required|string',
            'address' => 'required|string',
        ]);

        try {

            // Checking whether user exists before it creates
            if(User::where('email', $validatedData["email"])->exists()) {
                return redirect(route('seller.signup'))->withErrors(['email' => 'User already exists with that email'], 'dberror');
            }

            if(User::where('phone', $validatedData["phone"])->exists()) {
                return redirect(route('seller.signup'))->withErrors(['phone' => 'User already with that phone'], 'dberror');
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

            // Attach a seller account for the new user
            $user->seller()->create([
                'id' => Str::uuid()->toString(),
                'store_name' => $validatedData["store_name"],
            ])->save();

            // Saving all the user to the database
            $user->save();

            return redirect('auth');
        } catch (QueryException $e) {
            dd('An error has occured while creating a new user', $e);
        }
    }
}
