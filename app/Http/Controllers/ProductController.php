<?php

namespace App\Http\Controllers;
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
    public function update()
    {
        $product = Product::find(1);
        if (!$product) {
            return 'Produk tidak ditemukan!';
        }

        $product->category_id  = 1;
        $product->name         = 'LG TV Diupdate';
        $product->price        = 7500000;
        $product->stock        = 5;
        $product->description  = 'LG TV adalah televisi pintar andalan yang terkenal dengan teknologi layar mutakhir, seperti OLED dan QNED, serta teknologi ThinQ AI untuk pengalaman pengguna yang personal. Dilengkapi dengan sistem operasi webOS, LG TV menawarkan fitur streaming, kontrol suara, dan kualitas gambar tajam, menjadikannya pilihan utama untuk hiburan rumah, gaming, dan estetika ruangan.';
        $product->status       = 'habis';
        $product->save();

        return redirect('/products');
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
}
