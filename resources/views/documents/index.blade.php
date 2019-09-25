@extends('layouts.app2')

@section('title','書類を見る')

@include('layouts.footer')

@section('content')
<ul>
    @forelse($documents as $document)

    @if(Auth::user()->id==$document->user_id)
    <li>
        <a href="{{$document->id}}">書類名：{{$document->title}}</a>
        <a href="{{$document->id}}">登録日：{{$document->created_at}}</a>
        <a href="{{action('DocumentsController@edit',$document)}}" class="edit">[編集]</a>
        <a href="#" class="del" data-id="{{ $document->id }}">[削除]</a>
        <form method="post" action="{{ url('/document', $document->id) }}" id="form_{{ $document->id }}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
        </form>
    </li>
    @endif

    @empty
    <li>登録されている書類は０件です</li>


    @endforelse

</ul>
<script src="/js/main.js"></script>
@endsection