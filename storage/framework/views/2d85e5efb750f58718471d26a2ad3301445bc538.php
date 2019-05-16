<?php $__env->startSection('content'); ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Редактировать категорию</h1>
        </div>
        <form method="post">
            <?php echo csrf_field(); ?>

            <p>Введите наименование категории: <br> <input type="text" name="title" class="form-control"
                                                           value="<?php echo e($tag->title); ?>" required></p>
            <p>Описание категории: <br> <textarea name="description" class="form-control"><?php echo $tag->description; ?></textarea></p>
            <button type="submit" class="btn-success">Редактировать</button>
        </form>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>