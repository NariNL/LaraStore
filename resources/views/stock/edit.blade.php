@extends('layouts.app')
@section('content')


    <div class="panel-body">
        <td class="">
            <div>商品名：<strong>{{$product->title}}</strong></div>
            <div>在庫数:<strong>{{$stock_inventory}}</strong></div>
        </td>
        <form action="/stock/add/" method="post">
        @csrf
        <input type="number" name="stock">
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <button type="submit" class="btn btn-secondary">追加</button>
        </form>

    </div>
@endsection
