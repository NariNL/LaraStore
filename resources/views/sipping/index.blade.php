@extends('layouts.app')
@section('content')

<div class="panel panel-default">
    <div class="container">
        <p class="h3">配送会社一覧</p>
    </div>
 
    <div class="container">
        <a href="/sipping/store">登録</a>
        <table class="table table-striped task-table">
 
            <!-- テーブル本体 -->
            <tbody class="">
                <tr class="">
                    <th>会社名</th>
                    <th>電話番号</th>
                    <th>メールアドレス</th>
                    <th>  </th>
                </tr>
                @foreach ($members as $member)
                <tr>
                    <!-- 会員情報 -->
                    <td class="table-text">
                        <div>{{ $member->name }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{ $member->phone }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{ $member->email }}</div>
                    </td>
                    <td>
                        <!-- TODO: 編集ボタン -->
                        <a href="{{url('/sipping/edit/'.$member->id)}}" class="btn color-white">編集</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection