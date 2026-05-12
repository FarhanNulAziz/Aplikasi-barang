<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index ()
{
    $products = Product :: with ('category' ) ->latest () ->paginate (10);
    return view ('products.index', compact ('products') );
}

        public function insert()
    {
        $product = new Product();
        $product->category_id  = 1;          
        $product->name         = 'LG TV';
        $product->price        = 5000000;
        $product->stock        = 10;
        $product->description  = 'LG TV adalah televisi pintar andalan yang terkenal dengan teknologi layar mutakhir, seperti OLED dan QNED, serta teknologi ThinQ AI untuk pengalaman pengguna yang personal. Dilengkapi dengan sistem operasi webOS, LG TV menawarkan fitur streaming, kontrol suara, dan kualitas gambar tajam, menjadikannya pilihan utama untuk hiburan rumah, gaming, dan estetika ruangan.';
        $product->status       = 'tersedia';
        $product->save();

        return redirect('/products');
    }
   public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();

    return view('products.edit', compact('product', 'categories'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'category_id' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
    ]);

    $product = Product::findOrFail($id);

    $product->update([
        'name' => $request->name,
        'category_id' => $request->category_id,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
        'status' => $request->status,
    ]);

    return redirect('/products')->with('success', 'Produk berhasil diupdate');
}
    public function delete()
    {
        $product = Product::find(1);

        if (!$product) {
            return 'Produk tidak ditemukan!';
        }

        $product->delete();
        return redirect('/products');
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store()
    {
        $product = new Product();
        $product->name = request('name');
        $product->price = request('price');
        $product->stock = request('stock');
        $product->category_id = request('category_id');
        $product->description = request('description');
        $product->status = request('status');
        $product->save();

        return redirect('/products')->with('success', 'Produk berhasil ditambahkan!');
    }
}
