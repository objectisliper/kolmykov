@extends('layouts.app')
@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/blog/img/post-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>Категории</h1>
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
                    @foreach($categories as $category)
                        <div class="post-preview">
                            <a href="{!! route('articles.category.show', [
                                        'id' => $category->id,
                                        ]) !!}">{!! $category->title !!}</a>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </article>

@stop