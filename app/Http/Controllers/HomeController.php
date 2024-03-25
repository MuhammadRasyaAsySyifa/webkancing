<?php

namespace App\Http\Controllers;
use App\Models\Gallery;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function service()
    {
        return view('servis.service');
    }

    public function pemesanan()
    {
        return view('servis.pemesanan');
    }

    public function profile()
    {
        return view('profile.profile');
    }

    public function editprofile()
    {
        return view('profile.editprofile');
    }
    
    public function gallery()
    {
        $galleries = Gallery::all();
        return view('gallery.gallery', compact('galleries'));    }
    public function manage(){
        $galleries = Gallery::all();
        return view('gallery.manage', compact('galleries'));
    }        

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $gambar = $request->file('gambar');
        $gambarPath = $gambar->store('public/gambar'); 

        Gallery::create(['gambar' => $gambarPath]);

        return redirect('/gallery')->with('success', 'Gambar berhasil ditambahkan');
    }

    public function edit($id)
    {
        $gambar = Gallery::find($id);

        return view('gallery.edit', compact('gambar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
        ]);

        $gambar = Gallery::find($id);

        if ($gambar) {

            $gambarPath = $request->file('gambar')->store('public/gambar'); // Simpan gambar di dalam folder public/gambar
            $gambar->gambar = $gambarPath;
            $gambar->save();

            return redirect('/gallery')->with('success', 'Gambar berhasil diubah');
        } else {
            return redirect('/gallery')->with('error', 'Gambar tidak ditemukan');
        }
    }

    public function destroy($id)
    {
        $gambar = Gallery::find($id);

        if ($gambar) {
            $gambar->delete();

            return redirect('/gallery')->with('success', 'Gambar berhasil dihapus');
        } else {
            return redirect('/gallery')->with('error', 'Gambar tidak ditemukan');
        }
    }
        public function showImage($id)
    {
        $gambar = Gallery::find($id);

        if ($gambar) {
            $gambarPath = storage_path('app/' . $gambar->gambar);
            return response()->file($gambarPath, ['Content-Type' => mime_content_type($gambarPath)]);
        } else {
            return response()->file(public_path('images/gambar-default.jpg'), ['Content-Type' => 'image/jpeg']);
        }
}

}

