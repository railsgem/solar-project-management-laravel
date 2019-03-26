<?php

namespace App\Http\Controllers;

use App\EavAttribute;
use Illuminate\Http\Request;
use App\Http\Requests\EavAttributePost;
use App\Http\Requests\EavAttributeUpdate;
use Illuminate\Support\Facades\Storage;
use Config;

class EavAttributeController extends Controller
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
        $eav_attributes = EavAttribute::with('eav_entity')->sortable(['id' => 'desc'])->paginate(10);
        return view('eav_attribute.list', ['eav_attributes' => $eav_attributes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eav_attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EavAttributePost $request
     * @return \Illuminate\Http\Response
     */
    public function store(EavAttributePost $request)
    {
        try {
            $path = $request->image->store('images');
            EavAttribute::create(
                [
                    'name' => $request['name'],
                    'price' => $request['price'] * 100,
                    'description' => $request['description'],
                    'image' => $path,
                ]
            );
            return redirect()->action('EavAttributeController@index')->with('message', 'EavAttribute Create Successfully.');
        } catch (Exception $e) {
            return redirect()->action('EavAttributeController@index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EavAttribute  $eav_attribute
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eav_attribute = EavAttribute::with('eav_entity')->findOrFail($id);
        return view('eav_attribute.show', ['eav_attribute' => $eav_attribute]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EavAttribute  $eav_attribute
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eav_attribute = EavAttribute::with('eav_entity')->findOrFail($id);
        return view('eav_attribute.edit', ['eav_attribute' => $eav_attribute]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EavAttribute  $eav_attribute
     * @return \Illuminate\Http\Response
     */
    public function update(EavAttributeUpdate $request, $id)
    {
        try {
            $eav_attribute = EavAttribute::where('id', $id)->first();
            $input = $request->all();
            $eav_attribute->fill($input)->save();
            return redirect()->action('EavAttributeController@index')->with('message', 'EavAttribute '. $eav_attribute['attribute_code'].' Update Successfully.');
        } catch (Exception $e) {
            return redirect()->action('EavAttributeController@index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EavAttribute  $eav_attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $eav_attribute = EavAttribute::where('id', $id)->first();
            $eav_attribute->delete();
            return redirect()->action('EavAttributeController@index')->with('message', 'Item Delete Successfully.');
        } catch (Exception $e) {
            return redirect()->action('EavAttributeController@index')->with('error', $e->getMessage());
        }
    }
}
