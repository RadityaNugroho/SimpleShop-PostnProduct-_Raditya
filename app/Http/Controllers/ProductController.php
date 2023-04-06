<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\facades\storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request->all());
        $products = Product::all();
        return view('product.index',compact('products'));
     

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$data = $request->all();
        //$product = Product::create($data);

        $file =$request->file('photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path =$request->file('photo')->storeAs('public/products',$filename);

        $path = str_replace('public/','',$path);
        
        //dd($path);
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'stocks' => $request->stocks,
            'photo' => $path
        ];
        $product = Product::create($data);
        return redirect()->route('product.index');
        //return response()->json(['succes' =>'File Upload Successfully.']);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.update', compact('product'));
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

        $file =$request->file('photo');
        $filename = time() . '.' .
        $file->getClientOriginalExtension();
        $path =$request->file('photo')->storeAs('public/products',$filename);

        $path = str_replace('public/','',$path);
        $product = Product::find($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->stocks = $request->stocks;
        $product->photo = $path;
        $product->save();
        Storage::delete('public/'.$product->photo);
        //Storage::delete(['public/storage/products'.$product->photo]);
        return redirect()->route('product.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product.index');
    }
}
