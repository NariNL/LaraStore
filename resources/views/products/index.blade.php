@extends('layouts.app')
@section('content')

    <div class="container">
    <div class="panel-body">

        <h3>
        <th>商品登録</th>
        </h3>
        <!-- 商品登録フォーム -->
        <form method="POST" action="/product"  class="form-horizontal">
            {{ csrf_field() }}

            <!-- 商品名 -->
            <div class="form-group">
                <label for="product-title" class="col-sm-3 control-label">商品名</label>
                <div class="col-sm-6 pb-2">
                    <input type="text" name="title" id="product-title" class="form-control">
                </div>

                <label for="product-maker" class="col-sm-3 control-label">製造元</label>
                <div class="col-sm-6 pb-2">
                    <input type="text" name="maker" id="product-maker" class="form-control">
                </div>

                <label for="product-description" class="col-sm-3 control-label">商品詳細</label>
                <div class="col-sm-6 pb-2">
                    <input type="text" name="description" id="product-description" class="form-control">
                </div>

                <label for="product-color" class="col-sm-3 control-label">色</label>
                <div class="col-sm-6 pb-2">
                    <input type="text" name="color" id="product-color" class="form-control">
                </div>

                <label for="product-size" class="col-sm-3 control-label">サイズ</label>
                <div class="col-sm-6 pb-2">
                    <input type="text" name="size" id="product-size" class="form-control">
                </div>

                <label for="product-image" class="col-sm-3 control-label">画像</label>
                <div class="col-sm-6 pb-2">
                    <input type="file" name="image" id="product-image" class="form-control">
                </div>

                <label for="product-price" class="col-sm-3 control-label">値段</label>
                <div class="col-sm-6">
                    <input type="text" name="price" id="product-price" class="form-control">
                </div>

            </div>

            <!-- 商品追加ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <div class="text-end py-3">
                    <button type="submit" class="btn btn-secondary">
                        <i class="fa fa-plus"></i> 商品追加
                    </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
        {{-- エラーメッセージ --}}
    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
    @endif

    <!-- 商品一覧一覧表示 -->
    @if (count($products) > 0)
    <div class="panel panel-default">

        <div class="panel-body">
            <table class="table table-striped task-table">

                <!-- 商品一覧ヘッダ -->
                <thead>
                    <th>
                        <h4>商品一覧</h4>
                    </th>
                    <th>&nbsp;</th>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <!-- 商品情報テーブル -->
                        <td class="">
                            <div class="h4">{{$product->title}}</div>
                            {{-- <div>{{$product->maker}}</div>
                            <div>{{$product->description}}</div>
                            <div>{{$product->title}}</div>
                            <div>{{$product->color}}</div>
                            <div>{{$product->size}}</div>
                            <div>{{$product->image}}</div>
                            <div>{{$product->price}}円</div> --}}
                            <a href="/product/detail/{{$product->id}}" class="h5">商品を見る</a>
                            <form action="{{ url('product/'.$product->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" id="delete-product-{{ $product->id }}" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>削除
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
@endsection
