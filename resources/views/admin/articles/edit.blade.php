@extends ('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Редактировать пост</h1>
        </div>
        <form method="post">
            {!! csrf_field() !!}
            <p>Выбор категории (ий): <br> <select name="categories[]" class="form-control" multiple>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if(in_array($category->id, $arrCategories))
                                selected @endif>{{$category->title}}</option>
                    @endforeach
                </select></p>
            <p>Введите заголовок: <br> <input type="text" name="title" value="{{$article->title}}" class="form-control"
                                              required></p>
            <p>Анонс: <br> <textarea name="short_text" class="form-control"
                                     required>{!! $article->short_text !!}</textarea></p>
            <p>Текст поста: <br> <textarea name="full_text" class="form-control"
                                           required>{!! $article->full_text !!}</textarea></p>
            <button type="submit" class="btn-success">Редактировать</button>

        </form>
    </main>
@stop