@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="post py-4">
            <h2 class="text-center">{{$post['title']}}</h2>
            @if (isset($post->image))
                <img class="my-4" src="{{asset('storage/'.$post->image)}}" alt="">
            @endif
            <p>{{$post['content']}}</p>
            <p>Argomenti: 
                @foreach($post->tags as $tag)
                    {{$tag->name}}
                @endforeach
            </p>
        </div>
        <button class="btn btn-primary"><a class="text-decoration-none text-white" href="{{route('admin.posts.index')}}">Torna a tutti i post</a></button>
        <button class="btn btn-warning"><a class="text-decoration-none text-black" href="{{route('admin.posts.edit',$post->id)}}">Modifica</a></button>
        <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="d-inline-block" onsubmit="return confirm('Sei sicuro di voler eliminare questo post?')">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
        
        <h3 class="mt-4">Commenti al post</h3>
        @forelse ($post->comments as $comment)
            <div>{{$comment->name}}</div>
            <div>{{$comment->content}}</div>
            @if(!$comment->approved)
                <form action="{{route('admin.comments.update', $comment->id)}}" METHOD="POST">
                    @csrf
                    @METHOD("PATCH")
                    <button type="submit" class="btn btn-success">Approva</button>
                </form>
            @else   
                Commento Approvato
            @endif
            <form action="{{route('admin.comments.destroy', $comment->id)}}" METHOD="POST">
                    @csrf
                    @METHOD("DELETE")
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </form>
        @empty
            Al momento non c'è alcun commento.
        @endforelse
    </div>
@endsection