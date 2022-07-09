<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;

class StockController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('stock.index', [
            'products' => $products]);
    }

    public function fetchStockAllproducts()
    {
        $products = Product::leftjoin("stocks","stocks.product_id","products.id")->get()->toArray();
    }

    public function editstock(Request $request)

    {
        $product = Product::where('id', '=', $request->id)->first();
        // $products = Stock::join("紐づける対象のテーブル","テーブル名.対象のカラム","テーブル名.対象のカラム名")->get()->toArray();
        // $products = Stock::join("order_detail","stock.product_id","order_detail.item_id")->get()->toArray();
        // $item_sales_quantity = 0;
        // $item_inventory = 0;
        // foreach($products as $value)
        // {
        //     $item_sales_quantity = $item_sales_quantity + $value->sales_quantity;
        //     $item_inventory = $item_inventory + $value->inventory; 
        // }
        // $stock_inventory =  $item_inventory - $item_sales_quantity;
        return view('/stock.edit', [
            'product' => $product,
            'stock_inventory' => $request->stock
        ]);
    }

    public function addstock(Request $request)
    {
        $stock = new Stock;
        $stock->product_id = $request->product_id;
        $stock->inventory = $request->stock;
        $stock->save();

        return redirect('/stock');
    }
    
}
