<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class SippingController extends Controller
{
    /**
     *一覧ページ
     * 
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request)
        {
        $members = Member::orderBy('created_at', 'asc')->get();
            return view('sipping.index', [
                'members' => $members,
            ]);
        }
        public function store()
        {
            return view('sipping.add');
        }
        public function edit($id)
        {
            $members = Member::find($id);
            return view('sipping.edit', [
                'members' => $members,
            ]);
        }

    /**
     *新規登録ページ
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     *使う予定なし
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     *編集ボタンを押した時の処理
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     *レコードを削除
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
