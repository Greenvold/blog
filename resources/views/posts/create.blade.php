@extends('layouts.app')
@section('title')
New blog post
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <app-post-create />
        </div>
    </div>
</div>
@endsection