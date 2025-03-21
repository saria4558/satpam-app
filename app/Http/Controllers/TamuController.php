<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TamuController extends Controller
{
    public function index() {
        $tamus = Tamu::orderBy('created_at', 'asc')->get()->map(function ($tamu) {
            $tamu->formatted_date = $tamu->created_at->format('d-m-Y H:i');
            return $tamu;
        });
    
        return view('tamu.index', compact('tamus'));
    }

    public function create() {
        return view('tamu.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'keperluan' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'jadwal_kunjungan' => 'required|date_format:Y-m-d H:i',
            'dokumentasi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'in:waiting,done',
        ]);

        $dokumentasiPath = $request->hasFile('dokumentasi') 
            ? $request->file('dokumentasi')->store('dokumentasi_tamu', 'public') 
            : null;

        Tamu::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'keperluan' => $request->keperluan,
            'telepon' => $request->telepon,
            'jadwal_kunjungan' => $request->jadwal_kunjungan,
            'dokumentasi' => $dokumentasiPath,
            'status' => $request->status ?? 'waiting',
        ]);

        return redirect()->route('tamus.index')->with('success', 'Tamu berhasil ditambahkan!');
    }

    public function show($id){
        $tamu = Tamu::findOrFail($id);
        $tamu->formatted_date = $tamu->created_at->format('d-m-Y H:i');
        return view('tamu.show', compact('tamu'));
    }

    public function edit($id) {
        $tamu = Tamu::findOrFail($id);
        return view('tamu.edit', compact('tamu'));
    }

    public function update(Request $request, $id){
        $tamu = Tamu::findOrFail($id);

        $request->validate([
            'nama' => 'sometimes|string|max:255',
            'alamat' => 'sometimes|string|max:255',
            'keperluan' => 'sometimes|string|max:255',
            'telepon' => 'sometimes|string|max:15',
            'jadwal_kunjungan' => 'sometimes|date_format:Y-m-d H:i',
            'dokumentasi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'sometimes|in:waiting,done',
        ]);

        // Jika ada gambar baru, hapus yang lama
        if ($request->hasFile('dokumentasi')) {
            if ($tamu->dokumentasi) {
                Storage::disk('public')->delete($tamu->dokumentasi);
            }
            $dokumentasiPath = $request->file('dokumentasi')->store('dokumentasi_tamu', 'public');
            $tamu->dokumentasi = $dokumentasiPath;
        }

        // Update data
        $tamu->update($request->except(['dokumentasi']));
        $tamu->save();

        return redirect()->route('tamus.index')->with('success', 'Data tamu berhasil diperbarui!');
    }
}
