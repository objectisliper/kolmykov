@extends('layouts.app')
@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/blog/img/post-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{!! $contact-> title !!}</h1>
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
                    {!! $contact -> description !!}
                </div>
            </div>
            <br>
            <br>
            <br>
            <h1>Форма обратной связи</h1>
            <form method="post" action="/send">
                {!! csrf_field() !!}
                <p>Введите ваше имя: <br> <input type="text" name="name" class="form-control" required></p>
                <p>Ваш телефон: <br> <input name="phone" class="form-control" required></p>
                <p>Ваш e-mail: <br> <input name="email" class="form-control" required></p>
                <p>Ваше сообщение: <br> <textarea name="text" class="form-control" required></textarea></p>
                {!! app('captcha')->display() !!}
                @if ($errors->has('g-recaptcha-response'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                @endif
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                {!! NoCaptcha::renderJs() !!}
                <button type="submit" class="btn-success">Отправить</button>
            </form>
        </div>
    </article>
@stop