<?php

namespace App\Http\Controllers;
use App\Models\Jasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jasas = Jasa::all();
        return view('servis.jasamanage', compact('jasas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'deskripsilayanan' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'include' => 'nullable|string|max:255', // Validasi untuk include
            'penting' => 'nullable|string|max:255', // Validasi untuk penting
            'kategori' => 'nullable|string|max:255', // Validasi untuk penting
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);
    
        // Buat instance Jasa baru
        $jasa = new Jasa();
        $jasa->nama = $request->nama;
        $jasa->deskripsi = $request->deskripsi;
        $jasa->deskripsilayanan = $request->deskripsilayanan;
        $jasa->harga = $request->harga;
        $jasa->include = $request->include; // Simpan data include
        $jasa->penting = $request->penting; // Simpan data penting
        $jasa->kategori = $request->penting; // Simpan data penting

    
        // Simpan gambar
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $jasa->saveImage($image);
        }
    
        // Simpan data ke dalam database
        $jasa->save();
    
        // Redirect ke halaman indeks jasa dengan pesan sukses
        return redirect()->route('servis.index')->with('success', 'Jasa berhasil ditambahkan.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Temukan jasa berdasarkan ID
        $jasa = Jasa::findOrFail($id);

        // Tampilkan halaman edit dengan data jasa yang ditemukan
        return view('servis.edit', compact('jasa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'deskripsilayanan' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'include' => 'nullable|string',
            'penting' => 'nullable|string',
            'kategori' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // optional: validasi gambar
        ]);
    
        // Temukan jasa berdasarkan ID
        $jasa = Jasa::findOrFail($id);
    
        // Update data jasa berdasarkan data yang dikirim dari form
        $jasa->nama = $request->nama;
        $jasa->deskripsi = $request->deskripsi;
        $jasa->deskripsilayanan = $request->deskripsilayanan;
        $jasa->harga = $request->harga;
        $jasa->include = $request->include;
        $jasa->penting = $request->penting;
        $jasa->kategori = $request->kategori;

    
        // Jika ada gambar yang dikirim dari form, simpan gambar yang baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($jasa->gambar) {
                // Menghapus gambar lama dari direktori penyimpanan
                Storage::delete('public/images/' . $jasa->gambar);
            }
    
            // Simpan gambar baru
            $gambar = $request->file('gambar');
            $filename = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('public/images', $filename);
            $jasa->gambar = $filename;
        }
    
        // Simpan perubahan pada data jasa
        $jasa->save();
    
        // Redirect kembali ke halaman manage dengan pesan sukses
        return redirect()->route('servis.index')->with('success', 'Jasa berhasil diperbarui.');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Temukan jasa berdasarkan ID
    $jasa = Jasa::findOrFail($id);

    // Hapus gambar dari penyimpanan
    if ($jasa->gambar) {
        Storage::delete('public/images/' . $jasa->gambar);
    }

    // Hapus jasa dari database
    $jasa->delete();

    // Redirect kembali ke halaman manage dengan pesan sukses
    return redirect()->route('servis.index')->with('success', 'Jasa berhasil dihapus.');
}

    public function service()
    {   
        $jasas = Jasa::all();
        $kategoris = Jasa::select('kategori')->distinct()->get();

        return view('servis.service', compact('jasas', 'kategoris'));
    }

}
