@extends('layouts.app')
@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/blog/img/post-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{!! $article -> title !!}</h1>
                        <h2 class="subheading">{!! $article -> short_text !!}</h2>
                        <span class="meta">Опубликовано в {!! $article->created_at->format('H:i d-m-Y') !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! $article -> full_text !!}
                </div>
            </div>
            <br>
            <br>
            <hr>
            <br>
            @if(\Auth::check())
                <form method="post" action="{!! route('comments.add') !!}">
                    {!! csrf_field() !!}
                    <input type="hidden" value="{{$article->id}}" name="article_id">
                    <p>Комментарий:
                        <br>
                        <textarea class="form-control" name="comment"></textarea>
                        <br>
                        <button type="submit" class="btn btn-success">Добавить комментарий</button>
                    </p>
                </form>
            @endif
            <br>
            @foreach($comments as $comment)
                <div class="comment" style="border:1px solid #000;">
                    <p>{{_user($comment->user_id)->email}}</p>
                    <p>{{$comment->created_at->format('d-m-Y')}}</p>
                    <p>{!! $comment->comment !!}</p>
                </div>
            @endforeach
        </div>
    </article>

@stop