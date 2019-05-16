<?php $__env->startSection('content'); ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Список постов</h1>
            <a href="<?php echo route('articles.add'); ?>" class="btn btn-info">Добавить пост</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($article->id); ?></td>
                    <td><?php echo e($article->title); ?></td>
                    <td><?php echo e($article->created_at->format('d-m-Y H:i')); ?></td>
                    <td><a href="<?php echo route('articles.edit', ['id' => $article->id]); ?>">Редактировать</a> || <a
                                href="javascript:;" class="delete"
                                rel="<?php echo e($article->id); ?>">Удалить</a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $(function () {
            $('.delete').on('click', function () {
                if (confirm("Вы действительно хотите удалить пост?")){
                    let id = $(this).attr('rel');
                    $.ajax({
                        type: "DELETE",
                        url:"<?php echo route('articles.delete'); ?>",
                        data: {_token:"<?php echo e(csrf_token()); ?>", id:id},
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>