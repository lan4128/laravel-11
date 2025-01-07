<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import model Kustomer
use App\Models\Kustomer;
use Illuminate\Http\RedirectResponse;
//import return type view
use Illuminate\View\View;

class KustomerController extends Controller
{
    //
    public function index(): View
    {
        //get all kustomers
        $kustomers = Kustomer::latest()->paginate(10);

        //render view with kustomers
        return view('kustomers.index',compact('kustomers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('kustomers.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'nik'          => 'required|min:5',
            'name'         => 'required|min:3',
            'telp'         => 'required|min:5',
            'email'        => 'required|min:5',
            'alamat'       => 'required|min:10'
        ]);

        Kustomer::create([
            'nik'         => $request->nik,
            'name'        => $request->name,
            'telp'        => $request->telp,
            'email'       => $request->email,
            'alamat'      => $request->alamat
        ]);
        return redirect()->route('kustomers.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        //get Kustomer by ID
        $kustomer = Kustomer::findOrFail($id);
        return view('kustomers.show', compact('kustomer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        ////get Kustomer by ID
        $kustomer = Kustomer::findOrFail($id);
        return view('kustomers.edit', compact('kustomer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
        $request->validate([
            'nik'          => 'required|min:5',
            'name'         => 'required|min:3',
            'telp'         => 'required|min:5',
            'email'        => 'required|min:5',
            'alamat'       => 'required|min:10'
        ]);

        //get Kustomer by ID
        $kustomer = Kustomer::findOrFail($id);
            $kustomer->update([
                'nik'         => $request->nik,
                'name'        => $request->name,
                'telp'        => $request->telp,
                'email'       => $request->email,
                'alamat'      => $request->alamat
            ]);
        return redirect()->route('kustomers.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
        //get Kustomer by ID
        $kustomer = Kustomer::findOrFail($id);

        $kustomer->delete();

        return redirect()->route('kustomers.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }
}
