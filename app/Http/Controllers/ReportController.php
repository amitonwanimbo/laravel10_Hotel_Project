<?php

namespace App\Http\Controllers;
use App\Models\Report;//nama mode ambil dari database
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//Kode Auth halaman
use Illuminate\Support\Facades\Storage;//simpan gambar
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lapors = Report::where('user_id', Auth::id())->get();
        return view('staf.Laporan.index', compact('lapors'));
    }
    
    public function adminindex()
    {
        $lapors = Report::where('user_id', Auth::id())->get();
        return view('admin.index', compact('lapors'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staf.Laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'fasilitas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Report::create([
            'user_id' => Auth::id(),
            'fasilitas' => $request->fasilitas,
            'deskripsi' => $request->deskripsi,
            'status' => 'menunggu',
            'image' => $imagePath,
        ]);

        return redirect()->route('lapor.index')->with('success', 'Laporan kerusakan berhasil diajukan.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
