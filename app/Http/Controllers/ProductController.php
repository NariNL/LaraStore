<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     *一覧ページ
     *
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.index', [
            'products' => $products]);
    }



    /**
     * 商品登録
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'maker' => 'required',
            'description' => 'required',
            'color' => 'required',
            'price' => 'required|integer',
        ]);

        $product = new Product();
        $product->title = $request->title;
        $product->maker = $request->maker;
        $product->description = $request->description;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->save();

        return redirect('/products');

    }

    /**
     * 商品削除
     *
     * @param Request $request
     * @param Product $product
     * @return Response
     */

    public function destroy (Request $request, Product $product)
    {
        $product->delete();
        return redirect('/products');
    }


}
