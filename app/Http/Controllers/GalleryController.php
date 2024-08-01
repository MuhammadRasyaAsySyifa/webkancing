<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function gallery()
    {
        $galleries = Gallery::all();
        return view('gallery.gallery', compact('galleries'));
    }

    public function index()
    {
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

        $gambarPath = $request->file('gambar')->store('public/gambar');
        Gallery::create(['gambar' => $gambarPath]);

        return redirect()->route('gallery.gallery')->with('success', 'Gambar berhasil ditambahkan');
    }

    public function show($id)
    {
        $gambar = Gallery::findOrFail($id);
        $gambarPath = storage_path('app/' . $gambar->gambar);

        return response()->file($gambarPath, ['Content-Type' => mime_content_type($gambarPath)]);
    }

    public function edit($id)
    {
        $gambar = Gallery::findOrFail($id);
        return view('gallery.edit', compact('gambar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambar = Gallery::findOrFail($id);

        if ($request->hasFile('gambar')) {
            Storage::delete($gambar->gambar);
            $gambarPath = $request->file('gambar')->store('public/gambar');
            $gambar->gambar = $gambarPath;
        }

        $gambar->save();

        return redirect()->route('gallery.gallery')->with('success', 'Gambar berhasil diubah');
    }

    public function destroy($id)
    {
        $gambar = Gallery::findOrFail($id);
        Storage::delete($gambar->gambar);
        $gambar->delete();

        return redirect()->route('gallery.gallery')->with('success', 'Gambar berhasil dihapus');
    }
}
