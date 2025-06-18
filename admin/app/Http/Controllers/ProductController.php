<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products/products');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function deletep_post($id)
    {
        $data= Product::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function editp_post($id)
    {
        $data = Product::find($id);
        return view('products.updateproduct',compact('data'));
    }

    public function updatep_post(Request $request,$id)
    {
        $post = Product::find($id);
        $post->id= $request->product_id;
        $post->name= $request->product_name;
        $post->description= $request->description;
        $post->price= $request->price;
        $post->quantity= $request->quantity;
        $post->status= $request->status;
        //$post->image= $request->image;
        
       if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images','public');
        $post->image = $path; // Save path to DB
        }

       $post->category_id= $request->category_id;

        $post->save();

        return redirect()->route('product.view_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function product_search(Request $request)
    {
        $query = Product::query();

        if ($request->has('search') && $request->search !== null) {
        $query->where('id', 'like', '%' . $request->search . '%');
        }

        $post = $query->get();

        return view('products.products',compact('post'));
    }




    public function view_product()
    {
        $post = Product::all();
        return view('products.products',compact('post'));
    }

    /**
     * Display the specified resource.
     */
    
}
