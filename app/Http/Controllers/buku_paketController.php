<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\buku_paket;

class buku_paketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $data = buku_paket::all();
        return view('paket/dashboard', compact('data'));
    }
    // public function tambah(){
    //     $data = buku_paket::all();
    // }

    public function insert(Request $request){
        buku_paket::create($request->all());
        return redirect()->to('paket/dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
