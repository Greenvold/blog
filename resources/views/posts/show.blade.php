@extends('layouts.app')
@section('title')
{{$post->title}}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <app-post-show :post="{{$post}}"></app-post-show>
            <app-comments :entity_id="{{$post->id}}"></app-comments>
        </div>
    </div>
</div>
@endsection