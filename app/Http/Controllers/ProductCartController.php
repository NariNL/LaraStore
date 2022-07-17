<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductCartController extends Controller
{
    public function indexCart (Request $request)
    {
        $sessionProductData = $request->session()->get('session_product_data');
        //dd($sessionProductData);

        return view('products.cart', [
            'sessionProductData' => $sessionProductData]);

    }


    public function addCart (Request $request)
    {
        $this->validate($request, [
            'qty' => 'required|integer',
        ]);
        $sessionProductId = $request->id;
        $sessionProductTitle = $request->title;
        $sessionProductColor = $request->color;
        $sessionProductSize = $request->size;
        $sessionProductPrice = $request->price;
        $sessionProductQty = $request->qty;

        $sessionProductData = array();
        $sessionProductData = compact(
            'sessionProductId',
            'sessionProductTitle',
            'sessionProductColor',
            'sessionProductSize',
            'sessionProductPrice',
            'sessionProductQty'
        );

        if($request->session()->has('session_product_data'))
        {
            $currentSessionData=$request->session()->get('session_product_data');
            foreach ($currentSessionData as $index => $sessionData)
            {
                if($sessionData['sessionProductId']==$sessionProductData['sessionProductId'])
                {
                    $newQuantity = $sessionData['sessionProductQty']+$sessionProductData['sessionProductQty'];
                    $request->session()->put('session_product_data.' . $index . '.sessionProductQty', $newQuantity);
                    $request->session()->flash('カートに追加されました');
                    return redirect('/products/visitor');
                }
                else
                {
                    continue;
                }
            }
            $request->session()->push('session_product_data',$sessionProductData);
            $request->session()->flash('カートに追加されました');
            return redirect('/products/visitor');
        }
        else
        {
            $request->session()->push('session_product_data',$sessionProductData);
            $request->session()->flash('カートに追加されました');
            return redirect('/products/visitor');
        }
    }

    public function removeCart (Request $request)
    {
        $sessionProductData=$request->session()->get('session_product_data');
        foreach($sessionProductData as $key=>$remove){
            if($request->id==$remove['sessionProductId'])
            {
                unset($sessionProductData[$key]);
                $sessionProductData=array_values($sessionProductData);
            }
            else
            {
                continue;
            }
        }
        $request->session()->put('session_product_data',$sessionProductData);
        return redirect('/product/cart_items');
    }
}
