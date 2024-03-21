<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
    
        return view('products.index', compact('products'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'jumlah_produk' => 'required',
            'harga_sewa' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required',
        ]);

        if($request->hasFile('gambar')){
            $extension = $request->gambar->extension();
            $gambar = time().".". $extension;
            $request->gambar->storeAs('public/product/', $gambar);
            if ($request->file('gambar')->isValid()) {
                Product::create([
                    'name' =>$request->name,
                    'jumlah_produk' => $request->jumlah_produk,
                    'harga_sewa' => $request->harga_sewa,
                    'keterangan' => $request->keterangan,
                    'gambar' =>'/product/'.$gambar,
                ]);
            }
        }
        
    
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'jumlah_produk' => 'required',
            'harga_sewa' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required',
        ]);

        // dd($id);

        if($request->hasFile('gambar')){
            $extension = $request->gambar->extension();
            $gambar = time().".". $extension;
            $request->gambar->storeAs('public/product/', $gambar);
            if ($request->file('gambar')->isValid()) {
                Product::where('id', $id)->update([
                    'name' =>$request->name,
                    'jumlah_produk' => $request->jumlah_produk,
                    'harga_sewa' => $request->harga_sewa,
                    'keterangan' => $request->keterangan,
                    'gambar' =>'/product/'.$gambar,
                ]);
            }
        }
    
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }


}