<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use App\Models\Auth;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Storage;//simpan gambar

// baru
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   
        $pengguna = User::paginate(5);
        return view('admin.Users.index', compact('pengguna')); 
    }

    /**
     * Show the form for creating a new resource.
     */
   /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|string|max:255',
            'keter' => 'nullable|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,kepala,staf', // Sesuaikan dengan peran yang tersedia
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',



        ]);
 // Handle file upload
 $imageName = time().'.'.$request->image->extension();
 $request->image->move(storage_path('app/public/images/users'), $imageName);



// Buat pengguna baru dengan data yang valid
$pengguna = User::create([
    'name' => $request->name,
    'keter' => $request->keter,
    'email' => $request->email,
    'password' => bcrypt($request->password),
    'role' => $request->role,
    'image' => 'images/users/' . $imageName,
]);
        return redirect()->route('pengguna.index')->with('success', 'Berhasil Tambah....');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);

        return view('laporan.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengguna = User::findOrFail($id);
        return view('admin.Users.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'keter' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string|in:admin,kepala,staf',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->keter = $request->input('keter');
    $user->role = $request->role;


    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($user->image && file_exists(storage_path('app/public/' . $user->image))) {
            unlink(storage_path('app/public/' . $user->image));
        }

        // Simpan gambar baru
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(storage_path('app/public/images/users'), $imageName);
        $user->image = 'images/users/' . $imageName;
    }

    $user->save();

        return redirect()->route('pengguna.index')->with('success', 'Berhasi Ubah...');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengguna = User::findOrFail($id);
        $pengguna->delete();

        return redirect()->route('pengguna.index')->with('success', 'Berhasil Hapus.....');
    
    }
}
