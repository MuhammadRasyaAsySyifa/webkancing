<?php

// app/Http/Controllers/PromoController.php
namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::all();
        return view('promo.index', compact('promos'));
    }

    public function create()
    {
        return view('promo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('photo')->store('public/promos');

        Promo::create(['photo' => basename($path)]);

        return redirect()->route('promo.index')->with('success', 'Foto berhasil ditambahkan');
    }

   // app/Http/Controllers/PromoController.php
public function show($id)
{
    $promo = Promo::findOrFail($id);
    $path = storage_path('app/public/promos/' . $promo->photo);

    if (!file_exists($path)) {
        abort(404);
    }

    $file = file_get_contents($path);
    $type = mime_content_type($path);

    return response($file, 200)->header('Content-Type', $type);
}


    public function edit($id)
    {
        $promo = Promo::findOrFail($id);
        return view('promo.edit', compact('promo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $promo = Promo::findOrFail($id);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/promos');
            $promo->photo = basename($path);
        }

        $promo->save();

        return redirect()->route('promo.index')->with('success', 'Foto berhasil diperbarui');
    }

    public function destroy($id)
    {
        $promo = Promo::findOrFail($id);
        Storage::delete('public/promos/' . $promo->photo);
        $promo->delete();

        return redirect()->route('promo.index')->with('success', 'Foto berhasil dihapus');
    }
}
