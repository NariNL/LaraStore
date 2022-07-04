@extends('layouts.app')
@section('content')

    <!-- 商品一覧一覧表示 -->
    @if (count($products) > 0)
    <div class="panel panel-default">

        <div class="panel-body">
            <table class="table table-striped task-table">

                <!-- 商品一覧ヘッダ -->
                <thead>
                    <th>商品一覧</th>
                    <th>&nbsp;</th>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <!-- 商品情報テーブル -->
                        <td class="">
                            <div>{{$product->title}}</div>
                            {{-- <div>{{$product->maker}}</div>
                            <div>{{$product->description}}</div>
                            <div>{{$product->title}}</div>
                            <div>{{$product->color}}</div>
                            <div>{{$product->size}}</div>
                            <div>{{$product->image}}</div>
                            <div>{{$product->price}}円</div> --}}
                            <a href="/stock/edit/{{$product->id}}">在庫の追加</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
@endsection