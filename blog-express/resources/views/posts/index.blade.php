
@extends('template')

@section('content')

    <h1> Blog Express </h1>

    @foreach( $posts as $post)

        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <b>tags: </b><br>
        <ul>
            @foreach($post->tags as $tag)
            <li>{{$tag->name}}</li>
            @endforeach
        </ul>

        <h3>Comments</h3>

        @foreach($post->comments as $comment)
            <b>Name: </b>{{$comment->name}} <br>
            <b>Comment: </b>{{$comment-> comment}} <br><br>

        @endforeach
        <hr>

    @endforeach

@endsection
