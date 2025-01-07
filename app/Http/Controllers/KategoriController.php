<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import model Kategori
use App\Models\Kategori;
use Illuminate\Http\RedirectResponse;
//import return type view
use Illuminate\View\View;
//import directory Storage
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    //
    public function index(): View
    {
        //get all kategoris
        $kategoris = Kategori::latest()->paginate(10);

        //render view with kategoris
        return view('kategoris.index',compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('kategoris.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'name'          => 'required|min:3'
        ]);

        Kategori::create([
            'name'         => $request->name
        ]);
        return redirect()->route('kategoris.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        //get Kategori by ID
        $kategori = Kategori::findOrFail($id);
        return view('kategoris.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        ////get Kategori by ID
        $kategori = Kategori::findOrFail($id);
        return view('kategoris.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
        $request->validate([
            'name'          => 'required|min:3'
        ]);

        //get Kategori by ID
        $kategori = Kategori::findOrFail($id);
            $kategori->update([
                'name'         => $request->name
            ]);
        return redirect()->route('kategoris.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
        //get Kategori by ID
        $kategori = Kategori::findOrFail($id);

        $kategori->delete();

        return redirect()->route('kategoris.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }
}
