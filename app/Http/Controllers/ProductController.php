<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = product::get();


        return view('add')->with('product',$product);
    }
    public function Trashed()
    {

        $product = product::onlyTrashed()->get();


        return view('trashed')->with('product',$product);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = request()->validate([

            'name'          => 'required|min:3|max:25|',
            'qty'         => 'nullable|numeric|between:0,10000',
            'imagee'         => '',


        ]);
        $product = Product::create($data);
        $product->addMediaFromRequest('imagee')->toMediaCollection('glasses','media');


       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
       $product->delete();
       return redirect('product');
    }
    public function Force(Request $request)
    {
        $product = product::withTrashed()->find($request->id);

       $product->forceDelete();
       return redirect('product/aaa');
    }
    public function Restore(Request $request)
    {
        $product = product::withTrashed()->find($request->id);

       $product->restore();
       return redirect('product');
    }
    public function NewImage(Request $request)
    {
        $product = product::find($request->id);
        $product->addMediaFromRequest('imagee')->toMediaCollection('glasses','media');
       return redirect('product');
    }
    public function policy(Request $request)
    {

       return 'asasdasdasdasdas asasdasd asdasklnslklasfl lkaslfkjalfk';
    }
}
