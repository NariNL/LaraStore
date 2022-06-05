<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     *一覧ページ
     *
     * @param  Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $products = $request->products()->get();
        return view('products.index', [
            'products' => $products,
        ]);
    }

    /**
     * 商品登録
     * @param  Request $request
     * @return Response
     *
     */
    public function store (Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'maker' => 'required|max:100',
            'description' => 'required|max:500',
            'image' => 'image',
            'price' => 'required|integer',

        ]);

        // 商品作成

        $request->products()->create([
            'title' => $request->title,
            'maker' => $request->maker,
            'description' => $request->description,
            'color' => $request->color,
            'size' => $request->size,
            'image' => $request->image,
            'price' => $request->price,
        ]);

        return redirect('/tasks');

    }


}
