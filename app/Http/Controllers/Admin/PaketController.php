<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketFoto;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Menampilkan daftar paket.
     */
    public function index()
    {
        $pakets = PaketFoto::latest()->get();

        return view('admin.paket.index', compact('pakets'));
    }

    /**
     * Form tambah paket.
     */
    public function create()
    {
        return view('admin.paket.create');
    }

    /**
     * Simpan paket.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'nama_paket'      => 'required|string|max:255',

            'jenis_layanan'   => 'required|string|max:255',

            'harga'           => 'required|numeric|min:0',

            'deskripsi'       => 'required|string',

            'status'          => 'required|in:Aktif,Nonaktif',

            'booking_online'  => 'required|boolean',

        ]);

        PaketFoto::create($validated);

        return redirect()
            ->route('paket.index')
            ->with('success', 'Paket berhasil ditambahkan.');
    }

    /**
     * Form edit paket.
     */
    public function edit(PaketFoto $paket)
    {
        return view('admin.paket.edit', compact('paket'));
    }

    /**
     * Update paket.
     */
    public function update(Request $request, PaketFoto $paket)
    {
        $validated = $request->validate([

            'nama_paket'      => 'required|string|max:255',

            'jenis_layanan'   => 'required|string|max:255',

            'harga'           => 'required|numeric|min:0',

            'deskripsi'       => 'required|string',

            'status'          => 'required|in:Aktif,Nonaktif',

            'booking_online'  => 'required|boolean',

        ]);

        $paket->update($validated);

        return redirect()
            ->route('paket.index')
            ->with('success', 'Paket berhasil diperbarui.');
    }

    /**
     * Hapus paket.
     */
    public function destroy(PaketFoto $paket)
    {
        $paket->delete();

        return redirect()
            ->route('paket.index')
            ->with('success', 'Paket berhasil dihapus.');
    }
}