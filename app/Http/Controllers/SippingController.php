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
    public function create(Request $request){
        //登録処理を書く(新しくレコードを追加する)
        $member = new Member();
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->save();

        //一覧画面に戻す
        return redirect('/sipping');
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
    public function update(Request $request)
    {
        //既存のレコードを取得して、編集してから保存する
        $member = Member::where('id','=', $request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        

        return redirect('/sipping');
    }

    /**
     *レコードを削除
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        //既存のレコードを取得して、削除する
        $member = Member::where('id','=', $request->id)->first();
        $member->delete();

        return redirect('/sipping');

    }
}
