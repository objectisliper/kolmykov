@extends('layouts.app')
@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/blog/img/post-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{!! $category -> title !!}</h1>
                        <h2 class="subheading">{!! $category -> short_text !!}</h2>
                        <span class="meta">Опубликовано в {!! $category->created_at->format('H:i d-m-Y') !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                @foreach($articles as $article)
                <div class="post-preview">
                    <a href="{!! route('blog.show', [
                    'category' => str_slug($article->categories->first()->title),
                    'id' => $article->id,
                    'slug' => str_slug($article->title)
                    ]) !!}">
                        <h2 class="post-title">
                            {!! $article->title !!}
                        </h2>
                        <h3 class="post-subtitle">
                            {!! $article->short_text !!}
                        </h3>
                    </a>

                    <p class="post-meta">Опубликовано в {!! $article->created_at->format('H:i d-m-Y') !!}</p>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
    </article>

@stop