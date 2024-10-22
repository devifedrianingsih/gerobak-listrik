<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Fungsi untuk menampilkan halaman daftar produk
    public function index()
    {
        // Ambil semua produk dari database
        $products = Product::all();
        
        // Kirim data produk ke view ecommerce-products
        return view('ecommerce-products', compact('products'));
    }

    // Fungsi untuk menampilkan halaman tambah produk
    public function create()
    {
        // Ambil kategori dari database
        $categories = Category::all();
    
        // Kirim data kategori ke view
        return view('ecommerce-add-product', compact('categories'));
    }

    // Fungsi untuk menyimpan produk baru ke database
    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'ProductName' => 'required|string|max:255',
            'ProductDescription' => 'required|string',
            'Price' => 'required|numeric',
            'SellingPrice' => 'nullable|numeric', // Tambahkan validasi untuk harga jual
            'Stock' => 'required|integer',
            'CategoryID' => 'required|exists:categories,CategoryID', // Validasi category ID
            'ProductImage' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi gambar
        ]);

        // Proses upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('ProductImage')) {
            // Upload gambar ke folder public/products
            $imagePath = $request->file('ProductImage')->store('products', 'public');
        }

        // Tentukan status produk (draft atau publish)
        $status = $request->input('status', 'draft'); // Default ke 'draft' jika tidak ada input

        // Simpan produk baru ke database
        Product::create([
            'ProductName' => $validatedData['ProductName'],
            'ProductDescription' => $validatedData['ProductDescription'],
            'Price' => $validatedData['Price'],
            'SellingPrice' => $validatedData['SellingPrice'], // Tambahkan SellingPrice
            'Stock' => $validatedData['Stock'],
            'CategoryID' => $validatedData['CategoryID'],
            'ProductImage' => $imagePath, // Simpan path gambar
            'status' => $status, // Simpan status ('draft' atau 'publish')
        ]);

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Fungsi untuk meng-handle upload gambar dengan Fancy File Uploader
    public function uploadImage(Request $request)
    {
        // Validasi bahwa file adalah gambar dan sesuai aturan
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi gambar
        ]);

        // Proses upload gambar ke folder public/products
        if ($request->hasFile('file')) {
            $imagePath = $request->file('file')->store('products', 'public');

            // Return response jika berhasil
            return response()->json([
                'success' => true,
                'filePath' => Storage::url($imagePath),
                'fileName' => basename($imagePath)
            ], 200);
        }

        // Return error jika gagal
        return response()->json(['success' => false], 400);
    }
}
