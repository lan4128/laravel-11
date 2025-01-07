<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import model Satuan
use App\Models\Satuan;
use Illuminate\Http\RedirectResponse;
//import return type view
use Illuminate\View\View;


class SatuanController extends Controller
{
    //
    public function index(): View
    {
        //get all satuans
        $satuans = Satuan::latest()->paginate(10);

        //render view with satuans
        return view('satuans.index',compact('satuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('satuans.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'name'          => 'required|min:3',
            'descripsi'     => 'required|min:10'
        ]);

        Satuan::create([
            'name'         => $request->name,
            'descripsi'    => $request->descripsi
        ]);
        return redirect()->route('satuans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        //get Satuan by ID
        $satuan = Satuan::findOrFail($id);
        return view('satuans.show', compact('satuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        ////get Satuan by ID
        $satuan = Satuan::findOrFail($id);
        return view('satuans.edit', compact('satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
        $request->validate([
            'name'          => 'required|min:3',
            'descripsi'     => 'required|min:10'
        ]);

        //get Satuan by ID
        $satuan = Satuan::findOrFail($id);
            $satuan->update([
                'name'         => $request->name,
                'descripsi'    => $request->descripsi
            ]);
        return redirect()->route('satuans.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
        //get Satuan by ID
        $satuan = Satuan::findOrFail($id);

        $satuan->delete();

        return redirect()->route('satuans.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }
}
