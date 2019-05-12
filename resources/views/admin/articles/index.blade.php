@extends ('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Список постов</h1>
            <a href="{!! route('articles.add') !!}" class="btn btn-info">Добавить пост</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            @foreach($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->created_at->format('d-m-Y H:i')}}</td>
                    <td><a href="{!! route('articles.edit', ['id' => $article->id]) !!}">Редактировать</a> || <a
                                href="javascript:;" class="delete"
                                rel="{{$article->id}}">Удалить</a></td>
                </tr>
            @endforeach
        </table>
    </main>
@stop
@section('js')
    <script>
        $(function () {
            $('.delete').on('click', function () {
                if (confirm("Вы действительно хотите удалить пост?")){
                    let id = $(this).attr('rel');
                    $.ajax({
                        type: "DELETE",
                        url:"{!! route('articles.delete') !!}",
                        data: {_token:"{{csrf_token()}}", id:id},
                        complete: function () {
                            alert("Пост удален");
                            location.reload();
                        }
                    })
                }else {
                    alertify.error("Действие отменено пользователем");
                }
            })
        })
    </script>
@stop