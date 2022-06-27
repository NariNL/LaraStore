<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class StockController extends Controller
{
    public function fetchStockAllproducts()
    {
        $products = Product::leftjoin("stocks","stocks.product_id","products.id")->get()->toArray();
    }

    public function addstock()
    {
        
    }
    
}
