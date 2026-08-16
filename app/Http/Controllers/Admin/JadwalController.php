<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Services\JadwalService;

class JadwalController extends Controller
{
    public function index()
    {
        JadwalService::generate();
        
        $jadwals = Jadwal::orderBy('tanggal')
            ->orderBy('jam')
            ->get();

        return view('admin.jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        return view('admin.jadwal.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jam' => 'required',
            'status' => 'required'
        ]);

        Jadwal::create($validated);

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Jadwal $jadwal)
    {
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jam' => 'required',
            'status' => 'required'
        ]);

        $jadwal->update($validated);

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }

    public function hapusJadwalLama()
{
    $jumlah = \App\Models\Jadwal::whereDate(
        'tanggal',
        '<',
        now()->toDateString()
    )->delete();

    return redirect()
        ->route('jadwal.index')
        ->with(
            'success',
            $jumlah.' jadwal lama berhasil dihapus.'
        );
}
}