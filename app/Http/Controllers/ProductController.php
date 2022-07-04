<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     *一覧ページ
     *
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
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

    public function destroy (Product $product)
    {
        $product->delete();
        return redirect('/products');
    }


    public function edit(Request $request)
    {
        $product = Product::where('id', '=', $request->id)->first();
        return view('products.edit', [
            'product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'title' => 'required',
            'maker' => 'required',
            'description' => 'required',
            'color' => 'required',
            'price' => 'required|integer',
        ]);

        $product = Product::where('id', $request->id)->first();
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

    public function detail(Request $request)
    {
        $product = Product::where('id', '=', $request->id)->first();
        $item_sales_quantity = 0;
        $item_inventory = 0;
        // dd($products);
        $products = DB::table('orders_detail')
                        ->select('sales_quantity')
                        ->where('order_id', '=', $product->id)
                        ->get();
        foreach($products as $value)
        {
            $item_sales_quantity = $item_sales_quantity + $value->sales_quantity;
        }
        $stocks = DB::table('stocks')
                        ->select('inventory')
                        ->where('product_id', '=', $product->id)
                        ->get();
        foreach($stocks as $value)
        {
            $item_inventory = $item_inventory + $value->inventory; 
        }
        $stock_inventory =  $item_inventory - $item_sales_quantity;
        return view('products.detail', [
            'product' => $product,
            'stock_inventory' => $stock_inventory
        ]);
    }


}
