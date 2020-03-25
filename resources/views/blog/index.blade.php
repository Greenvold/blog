@extends('layouts.app')
@section('title')
Blog - home
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3>Blog posts</h3>
            <app-post-cards-list />
        </div>
    </div>
</div> @endsection