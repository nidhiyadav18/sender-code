<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::orderBy('id','desc')->get();
        return view('home', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['variants'] = DB::table('variants')->get();
        $data['price'] = DB::table('prices')->get();
        return view('create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'kg' => 'required',
            'price' => 'required'
            ]);

            $products = new Product;
            $products->name = $request->name;
            $products->kg = $request->kg;
            $products->price = $request->price;
            $products->save();
            return redirect()->route('products.index')
            ->with('success','products has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['variants'] = DB::table('variants')->get();
        $data['price'] = DB::table('prices')->get();
       $data['product'] = Product::find($id);
        return view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'kg' => 'required',
            'price' => 'required'
            ]);
            $products =  Product::find($id);
            $products->name = $request->name;
            $products->kg = $request->kg;
            $products->price = $request->price;
            $products->save();
            return redirect()->route('products.index')
            ->with('success','products has been update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
