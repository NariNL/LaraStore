@extends('layouts.app')
@section('content')


    <div class="panel-body">

            <div>商品名：<strong>{{$product->title}}</strong></div>
            <div>製造元：<strong>{{$product->maker}}</strong></div>
            <div>商品説明：<strong>{{$product->description}}</strong></div>
            <div>色：<strong>{{$product->color}}</strong></div>
            <div>サイズ：<strong>{{$product->size}}</strong></div>
            <div>{{$product->image}}</div>
            <div>値段：<strong>{{$product->price}}円</strong></div>
        <form method="POST" action="/product/cart"  class="form-horizontal">
            {{ csrf_field() }}
            <input type="hidden" value="{{$product->id}}" name="id">
            <input type="hidden" value="{{$product->title}}" name="title">
            <input type="hidden" value="{{$product->color}}" name="color">
            <input type="hidden" value="{{$product->size}}" name="size">
            <input type="hidden" value="{{$product->price}}" name="price">
            <input type="number" min="1" name="qty">個
            <button>カートに追加</button>
        </form>
            <div>
                <a href="/products/visitor">一覧に戻る</a>
            </div>

    </div>
@endsection
