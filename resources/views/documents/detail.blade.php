@extends('layouts.app2')
@section('title','詳細')
@include('layouts.footer')
@section('content')

@if(Auth::user()->id==$user_id)
<p>タイトル：{{ $title }}</p>
<p>詳細内容：{{ $content }}</p>
<p>ユーザID：{{ $user_id }}</p>
@endif

@if(Auth::user()->id==$user_id)
@if ($image_url)
<p>画像：<img src="/{{ $image_url }}"></p>
@endif
@endif

@endsection