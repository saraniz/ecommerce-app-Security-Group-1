<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesoController extends Controller
{
   public function index()
    {
       
        return view('category/categories');
       
    }

    
    public function category_view()
    {
        $post = Category::all();
        return view('category.categories',compact('post'));
    }

    public function deletec_post($id)
    {
        $data= Category::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function editc_post($id)
    {
        $data = Category::find($id);
        return view('category.updatecategory',compact('data'));
    }

    public function updatec_post(Request $request,$id)
    {
        $post = Category::find($id);
        
        //$post->id= $request->order_id;
        $post->user_id= $request->user_id;
        $post->total_amount= $request->total_amount;
        $post->status= $request->status;
        $post->payment_method= $request->payment_method;
        $post->shipping_address= $request->shipping_address;

        $post->save();

        return redirect()->route('categories.category_view');
    }

    

}
