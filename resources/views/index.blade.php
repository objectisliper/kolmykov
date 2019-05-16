@extends('layouts.app')
@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/blog/img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

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
{{--                    <p class="post-meta">Теги:@foreach($article->tags as $tag) {!! $tag->title !!} @endforeach</p>--}}
                    <p class="post-meta">Теги:@foreach($article->tags as $tag)<a href="{!! route('articles.tag.show', [
                                        'id' => $tag->id,
                                        ]) !!}">{!! $tag->title !!}</a>  @endforeach</p>

                    <p class="post-meta">Опубликовано в {!! $article->created_at->format('H:i d-m-Y') !!}</p>
                </div>
                <hr>
                @endforeach


                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>

@stop