@extends('layouts.app')
@section('title')
Edit post - {{$post->title}}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <app-post-create :edit="true" :_post="{{$post}}" />
        </div>
    </div>
</div>
@endsection