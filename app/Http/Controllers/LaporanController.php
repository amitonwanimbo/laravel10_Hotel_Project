<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;//Kode Auth halaman

use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
        public function index()
    {
        // Mengambil daftar laporan dengan paginasi
        $laporans = Laporan::orderBy('created_at', 'desc')->paginate(5);
        $laporans = Laporan::where('user_id', auth()->id())->get();
        return view('staf.laporans.index', compact('laporans'));
    }  
      // Menampilkan form pembuatan laporan
      public function create()
      {
         // Mengambil daftar laporan dengan paginasi
         $laporans = Laporan::orderBy('created_at', 'desc')->paginate(5);
         $laporans = Laporan::where('user_id', auth()->id())->get();
         return view('staf.laporans.index', compact('laporans'));
      }
      // Menyimpan laporan ke database
      public function store(Request $request)
  {
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $path = null;

    if ($request->hasFile('image')) {
        $file = $request->file('image');

        if ($file->isValid()) {
            $path = $file->store('public/laporan');
        } else {
            return redirect()->back()->with('error', 'File gambar tidak valid.');
        }
    }

    Laporan::create([
        'user_id' => auth()->id(),
        'judul' => $request->input('judul'),
        'deskripsi' => $request->input('deskripsi'),
        'image' => $path,
        'status' => 'menunggu',
    ]);
      return redirect()->route('lapor.create')->with('success', 'Laporan berhasil dibuat dan menunggu persetujuan.');
  }

  public function updateStatus(Request $request, Laporan $laporan, $status)
  {
      if (in_array($status, ['menunggu', 'dilihat', 'diterima'])) {
          $laporan->update(['status' => $status]);
      }

      return redirect()->route('lapor.index')->with('success', 'Status laporan berhasil diperbarui.');
  }
  
  public function laporanPegawai()
  {
      $laporans = Laporan::where('user_id', auth()->id())->get();
      return view('laporan.pegawai', compact('laporans'));
  }
  public function destroy(string $id)
  {
      $pengguna = Laporan::findOrFail($id);
      $pengguna->delete();

      return redirect()->route('lapor.create')->with('success', 'Berhasil Hapus.....');
  
  }
 // Menampilkan semua laporan untuk admin
 public function adminIndex()
 {
     $laporans = Laporan::with('user')->get();
     return view('admin.Laporan.index', compact('laporans'));
 }

 public function edit($id)
 {
   // Cari laporan berdasarkan id
   $laporan = Laporan::findOrFail($id);

   // Pastikan pengguna hanya dapat mengedit laporan milik mereka sendiri
   if ($laporan->user_id != auth()->id()) {
       return redirect()->route('lapor.index')->with('error', 'Anda tidak diizinkan mengedit laporan ini.');
   }

   return view('Staf.laporans.edit', compact('laporan'));
}

public function update(Request $request, $id)
{
   $laporan = Laporan::findOrFail($id);

   // Validasi data yang diupdate
   $request->validate([
       'judul' => 'required|string|max:255',
       'deskripsi' => 'required|string',
       'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
   ]);

   // Pastikan pengguna hanya dapat mengedit laporan milik mereka sendiri
   if ($laporan->user_id != auth()->id()) {
       return redirect()->route('lapor.index')->with('error', 'Anda tidak diizinkan mengedit laporan ini.');
   }

   // Proses update data laporan
   $laporan->judul = $request->judul;
   $laporan->deskripsi = $request->deskripsi;

   // Handle image baru jika diunggah
   if ($request->hasFile('image')) {
       $file = $request->file('image');
       if ($file->isValid()) {
           // Hapus image lama jika ada
           if ($laporan->image && file_exists(storage_path('app/' . $laporan->image))) {
               unlink(storage_path('app/' . $laporan->image));
           }

           // Simpan image baru
           $laporan->image = $file->store('public/laporan');
       }
   }

   $laporan->save();

   return redirect()->route('lapor.index')->with('success', 'Laporan berhasil diperbarui.');
}
public function show($id)
{
    $laporan = Laporan::findOrFail($id);
    return view('staf.laporans.show', compact('laporan'));
}
}