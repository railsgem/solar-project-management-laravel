<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductPost;
use App\Http\Requests\ProductUpdate;
use Illuminate\Support\Facades\Storage;
use Config;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::sortable(['id' => 'desc'])->paginate(10);
        return view('product.list', ['products' => $products]);
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
     * @param ProductPost $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductPost $request)
    {
        try {
            $path = $request->image->store('images');
            Product::create(
                [
                    'name' => $request['name'],
                    'price' => $request['price'] * 100,
                    'description' => $request['description'],
                    'image' => $path,
                ]
            );
            return redirect()->action('ProductController@index')->with('message', 'Product Create Successfully.');
        } catch (Exception $e) {
            return redirect()->action('ProductController@index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdate $request, $id)
    {
        try {
            $product = Product::where('id', $id)->first();
            $path = $product['image'];
            if ($request->file('image')) {
                $path = $request->image->store('images');
            }
            $product->name = $request->name;
            $product->price = $request->price * 100;
            $product->description = $request->description;
            $product->image = $path;
            $product->save();
            return redirect()->action('ProductController@index')->with('message', 'Product Update Successfully.');
        } catch (Exception $e) {
            return redirect()->action('ProductController@index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::where('id', $id)->first();
            $filename = $product['image'];
            Storage::delete($filename);
            $product->delete();
            return redirect()->action('ProductController@index')->with('message', 'Item Delete Successfully.');
        } catch (Exception $e) {
            return redirect()->action('ProductController@index')->with('error', $e->getMessage());
        }
    }
}
