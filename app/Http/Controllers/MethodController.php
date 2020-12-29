<?php

namespace App\Http\Controllers;

use App\method;
use Illuminate\Http\Request;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.method');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'method_name' => 'required',
        ]);
       $districts = new method();
       $districts-> method_name = $request->method_name;
       $districts ->save();

       return redirect('/methodform')->with('status', 'Method Type Save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\method  $method
     * @return \Illuminate\Http\Response
     */
    public function show(method $method)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\method  $method
     * @return \Illuminate\Http\Response
     */
    public function edit(method $method)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\method  $method
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, method $method)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\method  $method
     * @return \Illuminate\Http\Response
     */
    public function destroy(method $method)
    {
        //
    }
}
