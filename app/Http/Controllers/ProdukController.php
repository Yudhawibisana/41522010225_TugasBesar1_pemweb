<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function ViewProduk()
    {
        $produk = Produk::all();
        return view('produk', ['produk' => $produk]);
    }

    // old CreateProduk Function
    // public function CreateProduk(Request $request)
    // {
    //     Produk::create([
    //         'nama_produk' => $request->nama_produk,
    //         'deskripsi' => $request->deskripsi,
    //         'harga' => $request->harga,
    //         'jumlah_produk' => $request->jumlah_produk,
    //     ]);
    //     return redirect('/produk');
    // }
    public function CreateProduk(Request $request)
    {
        $imageName = null;

        if ($request->hasFile('image')) {
            // Get the uploaded file
            $imageFile = $request->file('image');

            // Create a unique name for the file
            $imageName = time() . '_' . $imageFile->getClientOriginalName();

            // Store the image in the 'public/image' folder
            $imageFile->storeAs('public/image', $imageName);
        }

        // Create the new product with the image
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'jumlah_produk' => $request->jumlah_produk,
            'image' => $imageName, // Store the image name in the database
        ]);

        return redirect('/produk');
    }

    public function ViewAddProduk()
    {
        return view('addproduk');
    }

    public function DeleteProduk($kode_produk)
    {
        Produk::where('kode_produk', $kode_produk)->delete();
        return redirect('/produk');
    }

    // public function ViewEditProduk($kode_produk)
    // {
    //     // Fix 1: Change to view 'edit_produk' and pass the product data
    //     $produk = Produk::where('kode_produk', $kode_produk)->first();
    //     return view('editproduk', ['produk' => $produk]);
    // }

    public function ViewEditProduk($kode_produk)
    {
        $ubahproduk = Produk::where('kode_produk', $kode_produk)->first();
        return view('editproduk', ['ubahproduk' => $ubahproduk]);
    }


    // public function UpdateProduk(Request $request, $kode_produk)
    // {
    //     // Fix 2: Create a separate method for updating the product
    //     Produk::where('kode_produk', $kode_produk)->update([
    //         'nama_produk' => $request->nama_produk,
    //         'deskripsi' => $request->deskripsi,
    //         'harga' => $request->harga,
    //         'jumlah_produk' => $request->jumlah_produk,
    //     ]);
    //     return redirect('/produk');
    // }

    public function UpdateProduk(Request $request,$kode_produk)
    {
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->storeAS('public/image', $imageName);
        }
        Produk::where('kode_produk', $kode_produk)->update([
            'nama_produk'=> $request->nama_produk,
            'deskripsi'=> $request->deskripsi,
            'harga'=> $request->harga,
            'jumlah_produk'=> $request->jumlah_produk,
            'image'=> $imageName
            ]);
            return redirect('/produk');
    }

}
