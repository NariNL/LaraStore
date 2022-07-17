@extends('layouts.app')
@section('content')

    <!-- 商品一覧一覧表示 -->

    @if (count($sessionProductData) > 0)
    <div class="panel panel-default">

        <div class="panel-body">
            <table class="table table-striped task-table">

                <!-- カートアイテム一覧ヘッダ -->
                <thead>
                    <th>カートアイテム一覧</th>
                    <th>&nbsp;</th>
                </thead>

                <tbody>
                    @foreach ($sessionProductData as $cartItem)
                    <table>
                        <tr>
                            <td>
                                <div>{{$cartItem['sessionProductTitle']}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{$cartItem['sessionProductColor']}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{$cartItem['sessionProductSize']}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{$cartItem['sessionProductPrice']}}円</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{$cartItem['sessionProductQty']}}個</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>小計{{$cartItem['sessionProductQty']*$cartItem['sessionProductPrice']}}円</div>
                            </td>
                        </tr>

                        <div>
                            <form action="/product/cart_items/remove" method="POST">

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" value="{{$cartItem['sessionProductId']}}" name="id">
                                <button type="submit"  class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>削除
                                </button>
                            </form>
                        </div>
                    </table>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
        <div>カートは空です。</div>
    @endif
    <div>
        <a href="/products/visitor">買い物を続ける</a>
    </div>
@endsection
