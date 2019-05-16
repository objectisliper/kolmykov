<?php $__env->startSection('content'); ?>
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
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($comment->id); ?></td>
                    <td><?php echo e(_article($comment->article_id)->title); ?></td>
                    <td><?php echo e(_user($comment->user_id)->email); ?></td>
                    <td><?php echo e($comment->comment); ?></td>
                    <td><?php if($comment->status): ?>Активен <?php else: ?> На модерации <br> <a href="<?php echo route('comment.accepted', ['id' => $comment->id]); ?>">Одобрить</a> <?php endif; ?></td>
                    <td><?php echo $comment->created_at->format('d-m-Y H:i'); ?></td>

                    
                                
                                
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $(function () {
            $('.delete').on('click', function () {
                if (confirm("Вы действительно хотите удалить категорию?")){
                    let id = $(this).attr('rel');
                    $.ajax({
                        type: "DELETE",
                        url:"<?php echo route('categories.delete'); ?>",
                        data: {_token:"<?php echo e(csrf_token()); ?>", id:id},
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>