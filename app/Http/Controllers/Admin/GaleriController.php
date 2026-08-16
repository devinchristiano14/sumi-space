<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\PaketFoto;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::with('paket')
            ->latest()
            ->get();

        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        $pakets = PaketFoto::where('status', 'Aktif')->get();

        return view('admin.galeri.create', compact('pakets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paket_foto_id' => 'required|exists:paket_fotos,id',
            'judul' => 'required|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $namaFile = time() . '.' . $request->gambar->extension();

        $request->gambar->move(
            public_path('storage/galeri'),
            $namaFile
        );

        Galeri::create([
            'paket_foto_id' => $request->paket_foto_id,
            'judul' => $request->judul,
            'gambar' => $namaFile,
        ]);

        return redirect()
            ->route('galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);

        $pakets = PaketFoto::where('status', 'Aktif')->get();

        return view(
            'admin.galeri.edit',
            compact('galeri', 'pakets')
        );
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'paket_foto_id' => 'required|exists:paket_fotos,id',
            'judul' => 'required|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $namaFile = $galeri->gambar;

        if ($request->hasFile('gambar')) {

            if (
                $galeri->gambar &&
                file_exists(public_path('storage/galeri/' . $galeri->gambar))
            ) {
                unlink(public_path('storage/galeri/' . $galeri->gambar));
            }

            $namaFile = time() . '.' . $request->gambar->extension();

            $request->gambar->move(
                public_path('storage/galeri'),
                $namaFile
            );
        }

        $galeri->update([
            'paket_foto_id' => $request->paket_foto_id,
            'judul' => $request->judul,
            'gambar' => $namaFile,
        ]);

        return redirect()
            ->route('galeri.index')
            ->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if (
            $galeri->gambar &&
            file_exists(public_path('storage/galeri/' . $galeri->gambar))
        ) {
            unlink(public_path('storage/galeri/' . $galeri->gambar));
        }

        $galeri->delete();

        return redirect()
            ->route('galeri.index')
            ->with('success', 'Galeri berhasil dihapus.');
    }
}