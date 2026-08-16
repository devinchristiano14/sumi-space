<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceList;
use Illuminate\Http\Request;

class PriceListController extends Controller
{
    public function index()
    {
        $priceLists = PriceList::latest()->get();

        return view('admin.pricelist.index', compact('priceLists'));
    }

    public function create()
    {
        return view('admin.pricelist.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'nama_layanan' => 'required|string|max:255',

            'harga' => 'required|numeric',

            'deskripsi' => 'nullable|string',

            'status' => 'required|in:Aktif,Nonaktif',

        ]);

        PriceList::create($validated);

        return redirect()
            ->route('pricelist.index')
            ->with('success','Price List berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $priceList = PriceList::findOrFail($id);

        return view('admin.pricelist.edit', compact('priceList'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([

            'nama_layanan' => 'required|string|max:255',

            'harga' => 'required|numeric',

            'deskripsi' => 'nullable|string',

            'status' => 'required|in:Aktif,Nonaktif',

        ]);

        $priceList = PriceList::findOrFail($id);

        $priceList->update($validated);

        return redirect()
            ->route('pricelist.index')
            ->with('success','Price List berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $priceList = PriceList::findOrFail($id);

        $priceList->delete();

        return redirect()
            ->route('pricelist.index')
            ->with('success','Price List berhasil dihapus.');
    }
}