@extends ('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Контакты</h1>
        </div>
            <form method="post">
                {!! csrf_field() !!}
                <p>Введите название: <br> <input type="text" name="title" class="form-control"
                                                               value="{{$contact->first()->title}}" required></p>
                <p>Описание контактов: <br> <textarea name="description" class="form-control">{!! $contact->first()->description !!}</textarea></p>
                <button type="submit" class="btn-success">Редактировать</button>
            </form>
    </main>
@stop