<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Typeanimal;
use App\Models\Product;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ProductController extends Controller
{
    public function addProduct()
    {
        $categories = Category::all();
        $typeanimal = Typeanimal::all();
        return view('products.add', compact('categories', 'typeanimal'));
    }

    public function postAddProduct(Request $request)
    {
        // Validasi data yang dikirim dari formulir
        $validatedData = $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'category_id' => 'required|numeric',
            'typeanimal_id' => 'required|numeric',
            'stok' => 'required|numeric',
            'berat' => 'nullable|numeric',
            'image' => 'nullable|file|mimes:jpeg,jpg|max:2048',
            // tambahkan validasi untuk kolom lainnya
        ]);

        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);
    }

        // Simpan produk baru ke dalam database
        $product = new Product;
        $product->nama_produk = $request->input('nama_produk');
        $product->harga = $request->input('harga');
        $product->category_id = $request->category_id;
        $product->typeanimal_id = $request->typeanimal_id;
        $product->stok = $request->input('stok');
        $product->berat = $request->input('berat');
        $product->image = $imageName;
        // $product->image = $request->input('image');
        // setel nilai atribut lainnya

        $product->save();

        // Redirect ke halaman daftar produk atau halaman lain yang diinginkan
        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableProduct()
    {
        $products = Product::all();
        $categories = Category::all();
        $typeanimal = Typeanimal::all();

        return view('products.table', compact('typeanimal', 'products', 'categories'));
    }

    public function detailProduct($id)
    {
        $products = Product::findOrFail($id);

        return view('products.detail', compact('products'));
    }

    public function editProduct($id)
    {
        $categories = Category::all();
        $typeanimal = Typeanimal::all();
        $products = Product::findOrFail($id);

        return view('products.edit', compact('products', 'categories', 'typeanimal'));
    }

    public function updateProduct(Request $request, $id)
    {
        $products = Product::findOrFail($id);

        $this->validate($request, [
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'category_id' => 'required|numeric',
            'typeanimal_id' => 'required|numeric',
            'stok' => 'required|numeric',
            'berat' => 'nullable|numeric',
            'image' => 'nullable|file|mimes:jpeg,jpg|max:2048',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        DB::table('products')
            ->where('id', $products->id)
            ->update([
                'nama_produk'  => $request->nama_produk,
                'harga'   => $request->harga,
                'category_id'   => $request->category_id,
                'typeanimal_id'   => $request->typeanimal_id,
                'stok'   => $request->stok,
                'berat'   => $request->berat,
                'image'   => $request->image,
        ]);

        if ($request->image) {
            $request->validate( ['image' => 'nullable|mimes:png,jpg,jpeg|max:2048'] );
            Storage::delete($products->image);

            $file = $request->file('image');
            $image = sha1($file->getClientOriginalName() . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('public/images', $image);
        } elseif ($products->image) {
            $image = $products->image;
        } else {
            $image = null;
        }

        DB::table('products')
            ->where('id', $products->id)
            ->update([
                'image'       => $image,
                'nama_produk'           => $request->nama_produk,
                'harga'           => $request->harga,
                'category_id'          => $request->category_id,
                'typeanimal_id'         => $request->typeanimal_id,
                'stok'      => $request->stok,
                'berat'      => $request->berat,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Produk Berhasil di Update');
    }

    public function destroyProduct($id)
    {
        $products = Product::findorFail($id);
        Storage::delete($products->image);
        $products->delete();


        return redirect()->back()->with('success', 'Produk tersebut berhasil di hapus!');
    }

    public function all_shop()
    {
        $products = Product::all();
        return view('shop', compact('products'));
    }

    public function all_category()
    {
        $categories = Category::all();
        return view('service', compact('categories'));
    }

    public function indexByAnimal($typeanimal)
    {
        $typeanimal = Typeanimal::where('jenis_hewan', $typeanimal)->first();

        if ($typeanimal) {
            $products = $typeanimal->products;
            return view('products.shop-kucing', compact('typeanimal', 'products'));
        }

        abort(404);
    }

    public function indexByCategory($category)
    {
        $category = Category::where('nama_produk', $category)->first();

        if ($category) {
            $products = $category->products;
            return view('products.shop-kucing', compact('category', 'products'));
        }

        abort(404);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::where('nama_produk', 'LIKE', "%$keyword%")->get();
        return view('products.hasil-cari', compact('products', 'keyword'));
    }

    public function importProduct(Request $request)
    {
        // dd($request);
        $request->validate([
            'excel' => 'required|file|mimes:xlsx,xls|max:10000',
        ]);

        Excel::import(new ProductImport, $request->file('excel'));

        return redirect()->back()->with('success', 'Import Data Produk Berhasil!');
    }
}
