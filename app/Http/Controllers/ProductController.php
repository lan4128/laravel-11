<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import model product
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
//import return type view
use Illuminate\View\View;
//import directory Storage
use Illuminate\Support\Facades\Storage;
use PDF;

class ProductController extends Controller
{
    //
    public function index(): View
    {
        //get all products
        $products = Product::latest()->paginate(10);

        //render view with products
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('products.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'image'          => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'          => 'required|min:5',
            'description'    => 'required|min:10',
            'price'          => 'required|numeric',
            'stock'          => 'required|numeric'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/products',$image->hashName());

        Product::create([
            'image'         => $image->hashName(),
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock
        ]);
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        //get product by ID
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        ////get product by ID
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
        $request->validate([
            'image'          => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'          => 'required|min:5',
            'description'    => 'required|min:10',
            'price'          => 'required|numeric',
            'stock'          => 'required|numeric'
        ]);

        //get product by ID
        $product = Product::findOrFail($id);

        //cek jika request ubah gambar
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $image->storeAs('public/products',$image->hashName());

            //delete gambar lama dari dataset product
            Storage::delete('public/products'.$product->image);

            $product->update([
                'image'         => $image->hashName(),
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);
        }else{ //jika gambar telah diupload sebelumnya
            $product->update([
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);
        }
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
        //get product by ID
        $product = Product::findOrFail($id);
        Storage::delete('public/products/'.$product->image);
        $product->delete();

        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }

    public function productPDF()
    {

        $products = Product::get();
        $data = [
            'title' => 'Data Product - Latihan Praktikum Web',
            'date' => date('m/d/Y'),
            'products' => $products

        ];
        $pdf = PDF::loadview('products.productpdf',$data);
        $pdf->setPaper('A4','landscape');
        return $pdf->stream('Data Product.pdf',array("attachment"=>false));
    }

    public function productExcel()
    {
        $products = Product::get();
        $data = [
            'title' => 'Data Product - Latihan Praktikum Web',
            'date' => date('m/d/Y'),
            'products' => $products

        ];
        return view('products.productexcel',$data);
    }
}
