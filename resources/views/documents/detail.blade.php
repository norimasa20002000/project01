@extends('layouts.app2')
@section('title','詳細')
@include('layouts.footer')
@section('content')

@if(Auth::user()->id==$user_id)
<p>{{ $title }}</p>
<p>{{ $content }}</p>
<!-- <p>ユーザID：{{ $user_id }}</p> -->
@endif

@if(Auth::user()->id==$user_id)
@if ($image_url)
<div class="document-image">
    <img src="/{{ $image_url }}">
</div>
@endif
@endif

@endsection