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
    </li>
    @endif

    @empty
    <li>登録されている書類は０件です</li>


    @endforelse

</ul>
@endsection