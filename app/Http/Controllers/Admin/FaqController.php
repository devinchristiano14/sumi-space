<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Menampilkan daftar FAQ
     */
    public function index()
    {
        $faqs = Faq::latest()->get();

        return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Form tambah FAQ
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Simpan FAQ
     */
    public function store(Request $request)
{
    $request->validate([
        'pertanyaan' => 'required|max:255',
        'jawaban' => 'required',
        'status' => 'required|in:Aktif,Nonaktif',
    ]);

    Faq::create([
        'pertanyaan' => $request->pertanyaan,
        'jawaban' => $request->jawaban,
    ]);

    return redirect()
        ->route('faq.index')
        ->with('success', 'FAQ berhasil ditambahkan.');
}

    /**
     * Form edit FAQ
     */
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);

        return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update FAQ
     */
    public function update(Request $request, $id)
{
    $faq = Faq::findOrFail($id);

    $request->validate([
        'pertanyaan' => 'required|max:255',
        'jawaban' => 'required',
    ]);

    $faq->update([
        'pertanyaan' => $request->pertanyaan,
        'jawaban' => $request->jawaban,
    ]);

    return redirect()
        ->route('faq.index')
        ->with('success', 'FAQ berhasil diperbarui.');
}

    /**
     * Hapus FAQ
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);

        $faq->delete();

        return redirect()
            ->route('faq.index')
            ->with('success', 'FAQ berhasil dihapus.');
    }
}