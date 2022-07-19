@extends('layouts.app')
@section('content')

    <!-- 商品一覧一覧表示 -->
    @if (count($products) > 0)
    <div class="panel panel-default">

        <div class="panel-body">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <table class="table table-striped task-table">

                <!-- 商品一覧ヘッダ -->
                <thead>
                    <th>商品一覧</th>
                    <th>&nbsp;</th>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                    <table>
                        <!-- 商品情報テーブル -->
                        <tr>
                            <th>
                                <div>{{$product->title}}</div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <div>{{$product->maker}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{$product->price}}円</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="/product/visitor/detail/{{$product->id}}">商品を見る</a>
                            </td>
                        </tr>
                    </table>
                    @endforeach
                </tbody>
            </table>
            <div>
                <a href="/product/cart_items">カートを見る</a>
            </div>
        </div>
    </div>
    @endif
@endsection
