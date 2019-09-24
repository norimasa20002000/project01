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

        //画像アップロード
        $time = date("Ymdhis");
        $document->image_url = $request->image_url->storeAs('public/document_images', $time.'_'.Auth::user()->id . '.jpg');

        // インスタンスの状態をデータベースに書き込む
        $document->save();

        //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト
        return redirect()->route('documents.detail', [
           'id' => $document->id,
       ]);
    }

    //一覧表示
    public function index()
    {
        $documents = Document::latest()->get();
        // $documents = [];
        // dd($documents->toArray());
        // dd(Auth::user()->id);
        return view('documents.index')->with('documents', $documents);
    }

    //詳細表示
    public function detail(Document $document)
    {
        return view('documents.detail', [
           'title' => $document->title,
           'content' => $document->content,
           'user_id' => $document->user_id,
           'image_url' => str_replace('public/', 'storage/', $document->image_url),
       ]);
    }

    //編集
    public function edit(Document $document)
    {
        return view('documents.edit')->with('document', $document);
    }

    //アップデート
    public function update(CreateDocument $request, Document $document)
    {
        // タイトル
        $document->title = $request->title;
        //コンテンツ
        $document->content = $request->content;
        //登録ユーザーからidを取得
        $document->user_id = Auth::user()->id;

        // 画像アップロード
        // $time = date("Ymdhis");
        // $document->image_url = $request->image_url->storeAs('public/document_images', $time.'_'.Auth::user()->id . '.jpg');

        // インスタンスの状態をデータベースに書き込む
        $document->save();

        // 「投稿する」をクリックしたら投稿情報表示ページへリダイレクト
        // return redirect()->route('documents.detail', [
        //        'id' => $document->id,
        //    ]);
        return redirect("document/index");
    }
}
