@extends('layouts.app')
@section('title')
Your posts
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Title</td>
                            <td>Created at</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (auth()->user()->posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>
                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-success">Edit</a>
                                <form action="/post/{{$post->id}}" method="POST">
                                    @method("DELETE")
                                    @csrf
                                    <button class="btn btn-sm btn-warning" type="submit">Delete</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection