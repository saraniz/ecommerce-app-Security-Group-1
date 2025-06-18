<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users/usermanage');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function user_view()
    {
        $post = User::all();
        return view('users.usermanage',compact('post'));
    }

    public function user_search(Request $request)
    {
        $query = User::query();

        if ($request->has('search') && $request->search !== null) {
        $query->where('id', 'like', '%' . $request->search . '%');
        }

        $post = $query->get();

        return view('users.usermanage',compact('post'));
    }

    public function deleteu_post($id)
    {
        $data= User::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function editu_post($id)
    {
        $data = User::find($id);
        return view('users.updateuser',compact('data'));
    }

    public function updateu_post(Request $request,$id)
    {
        $post = User::find($id);
        $post->id= $request->user_id;
        $post->fullname= $request->user_name;
        $post->email= $request->email;
        $post->password= $request->password;
        $post->is_verified= $request->is_verified;
        
        $post->save();

        return redirect()->route('user.user_view');
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function auth(Request $request)
    {
        //
    }

    public function dashboard()
    {
        //
        
    }

    /**
     * Display the specified resource.
     */
    
}
