@extends ('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Список комментарий</h1>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Статья</th>
                <th>Пользователь</th>
                <th>Комментарий</th>
                <th>Статус</th>
                <th>Дата добавления</th>
            </tr>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{_article($comment->article_id)->title}}</td>
                    <td>{{_user($comment->user_id)->email}}</td>
                    <td>{{$comment->comment}}</td>
                    <td>@if($comment->status)Активен @else На модерации <br> <a href="{!! route('comment.accepted', ['id' => $comment->id]) !!}">Одобрить</a> @endif</td>
                    <td>{!! $comment->created_at->format('d-m-Y H:i') !!}</td>

                    {{--<td><a href="{!! route('categories.edit', ['id' => $category->id]) !!}">Редактировать</a> || <a--}}
                                {{--href="javascript:;" class="delete"--}}
                                {{--rel="{{$category->id}}">Удалить</a></td>--}}
                </tr>
            @endforeach
        </table>
    </main>
@stop
@section('js')
    <script>
        $(function () {
            $('.delete').on('click', function () {
                if (confirm("Вы действительно хотите удалить категорию?")){
                    let id = $(this).attr('rel');
                    $.ajax({
                        type: "DELETE",
                        url:"{!! route('categories.delete') !!}",
                        data: {_token:"{{csrf_token()}}", id:id},
                        complete: function () {
                            alert("Категория удалена");
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