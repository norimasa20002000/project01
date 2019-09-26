@extends('layouts.app3')
@section('content')
@include('layouts.footer')
@if($errors->any())
<div class="error">
    <ul>
        @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif
<!-- <form method="post" action="{{ route('documents.create') }}" enctype="multipart/form-data" class="form"> -->


<form method="post" action="{{ url('/document', $document->id) }}" enctype="multipart/form-data" class="form">
    {{ csrf_field() }}
    {{ method_field('patch') }}
    <!-- <div class="form-image_url">
        <input type="file" name="image_url">
    </div> -->

    <div class="form">
        <div class="form-title">
            <label for="title"></label>
            </br>
            <input class="" name="title" value="{{ old('title', $document->title) }}" placeholder="書類名">
        </div>

        <div class="form-content">
            <label for="content" class="form-content"></label>
            </br><textarea class="" name="content" cols="45" rows="5"
                placeholder="格納場所/内容">{{ old('content',$document->content) }}</textarea>
        </div>

        <div class="form-submit">
            <button type="submit" value="Update">アップデート</button>
        </div>
    </div>
</form>
@endsection