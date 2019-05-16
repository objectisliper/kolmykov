@extends ('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Список тегов</h1>
            <a href="{!! route('tags.add') !!}" class="btn btn-info">Добавить тег</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>Описание</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->title}}</td>
                    <td>{!! $tag->description !!}</td>
                    <td>{{$tag->created_at->format('d-m-Y H:i')}}</td>
                    <td><a href="{!! route('tags.edit', ['id' => $tag->id]) !!}">Редактировать</a> || <a
                                href="javascript:;" class="delete"
                                rel="{{$tag->id}}">Удалить</a></td>
                </tr>
            @endforeach
        </table>
    </main>
@stop
@section('js')
    <script>
        $(function () {
            $('.delete').on('click', function () {
                if (confirm("Вы действительно хотите удалить тег?")){
                    let id = $(this).attr('rel');
                    $.ajax({
                        type: "DELETE",
                        url:"{!! route('tags.delete') !!}",
                        data: {_token:"{{csrf_token()}}", id:id},
                        complete: function () {
                            alert("Тег удален");
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