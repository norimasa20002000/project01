<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Document;
use App\Http\Requests\CreateDocument;

class DocumentsController extends Controller
{
    //
    public function showCreateForm()
    {
        return view('documents/create');
    }

    public function create(CreateDocument $request)
    {
        // Postモデルのインスタンスを作成する
        $document = new Document();
        // タイトル
        $document->title = $request->title;
        //コンテンツ
        $document->content = $request->content;
        //登録ユーザーからidを取得
        $document->user_id = Auth::user()->id;
        // インスタンスの状態をデータベースに書き込む
        $document->save();
        //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト
        return redirect()->route('documents.detail', [
           'id' => $document->id,
       ]);
    }

    public function detail(Document $document)
    {
        return view('documents/detail', [
           'title' => $document->title,
           'content' => $document->content,
           'user_id' => $document->user_id,
       ]);
    }
}
