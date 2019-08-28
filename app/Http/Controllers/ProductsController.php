<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Image;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Cart;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index',['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        if ($request->imgs != NULL) {
            $product_id = Product::create($request->all())->id;
            $gallery = new Gallery();
            $gallery->product_id = $product_id;
            $gallery->save();
            $index = 1;
            foreach ($request->imgs as $img) {
                $ext = $img->extension();
                $path = $product_id . "/" . "$index" ."." . $ext;
                $file = $img->storeAs('public', $path);

                $url = Storage::url($file);
                $index = $index + 1;
                $image = new Image();
                $image->gallery_id = $gallery->id;
                $image->link = $url;
                $image->save();

            }
        }
        else{
            echo "Загрузи фото!";
            return redirect()->back();
        }
        return redirect()->route('product.index');
    }

    public function show($id)
    {
        $product = Product::where('id',$id)->first();
        return view('products.show',['product' => $product]);
    }

    public function edit($id)
    {

        $product = Product::find($id);
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->fill($request->all());
        $product->save();
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {

        Product::destroy($id);
        return redirect()->route('product.index');
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);
        $request->session()->put(['cart'=> $cart]);
//        dd($request->session()->get('cart'));
        return redirect()->route('product.index');
    }

}
