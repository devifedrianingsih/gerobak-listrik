<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // 1. Tampilkan daftar produk
    public function index()
    {
        // Hitung jumlah produk berdasarkan status
        $publishedCount = Product::where('status', 'published')->count();
        $draftCount = Product::where('status', 'draft')->count();

        // Ambil semua produk dengan kategori
        $products = Product::with('category')->get();
        $categories = Category::all(); // Ambil semua data kategori

        // Kirim data ke view
        return view('ecommerce-products', compact('products', 'categories', 'publishedCount', 'draftCount'));
    }

    // 2. Form tambah produk
    public function create()
    {
        // Ambil semua kategori
        $categories = Category::all();

        return view('ecommerce-add-product', compact('categories'));
    }

    // 3. Simpan data produk baru
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'ProductName' => 'required|string|max:255',
            'ProductDescription' => 'required|string',
            'Price' => 'nullable|numeric',
            'Stock' => 'required|integer',
            'CategoryID' => 'required|exists:categories,CategoryID', // Periksa apakah kategori ada
            'ProductImage' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published', // Status harus draft atau published
        ]);

        // Proses upload gambar (jika ada)
        $imagePath = null;
        if ($request->hasFile('ProductImage')) {
            $file = $request->file('ProductImage');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('img/product_image'); // Folder public/img/product_image
            $file->move($destinationPath, $fileName); // Pindahkan file
            $imagePath = 'img/product_image/' . $fileName; // Path untuk disimpan ke database
        }        

        // Simpan produk ke database
        Product::create([
            'ProductName' => $validatedData['ProductName'],
            'ProductDescription' => $validatedData['ProductDescription'],
            'Price' => $validatedData['Price'],
            'Stock' => $validatedData['Stock'],
            'CategoryID' => $validatedData['CategoryID'],
            'ProductImage' => $imagePath,
            'status' => $validatedData['status'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // 4. Proses upload gambar
    public function uploadImage(Request $request)
    {
        // Validasi input file
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload file
        if ($request->hasFile('file')) {
            $imagePath = $request->file('file')->store('products', 'public');

            // Kembalikan respon JSON
            return response()->json([
                'success' => true,
                'filePath' => Storage::url($imagePath),
                'fileName' => basename($imagePath)
            ], 200);
        }

        return response()->json(['success' => false], 400);
    }

    //Update Produk
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'ProductName' => 'required|string|max:255',
            'ProductDescription' => 'required|string',
            'Price' => 'required|numeric',
            'Stock' => 'required|integer',
            'CategoryID' => 'required|exists:categories,CategoryID',
            'status' => 'required|in:draft,published',
        ]);
    
        // Cari produk berdasarkan ID
        $product = Product::findOrFail($id);
    
        // Update data produk
        $product->update($validatedData);
    
        // Redirect dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    //Delete Produk
    public function destroy($id)
    {
        // Temukan produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Hapus file gambar jika ada
        if ($product->ProductImage && file_exists(public_path($product->ProductImage))) {
            unlink(public_path($product->ProductImage)); // Hapus file gambar dari direktori
        }

        // Hapus produk dari database
        $product->delete();

        // Redirect kembali ke halaman produk dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
    }
}