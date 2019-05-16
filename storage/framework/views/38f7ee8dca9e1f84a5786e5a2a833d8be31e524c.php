<?php $__env->startSection('content'); ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Редактировать пост</h1>
        </div>
        <form method="post">
            <?php echo csrf_field(); ?>

            <p>Выбор категории (ий): <br> <select name="categories[]" class="form-control" multiple>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"
                                <?php if(in_array($category->id, $arrCategories)): ?>
                                selected <?php endif; ?>><?php echo e($category->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select></p>
            <p>Выбор тега (ов): <br> <select name="tags[]" class="form-control" multiple>
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tag->id); ?>"
                                <?php if(in_array($tag->id, $arrTags)): ?>
                                selected <?php endif; ?>><?php echo e($tag->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select></p>
            <p>Введите заголовок: <br> <input type="text" name="title" value="<?php echo e($article->title); ?>" class="form-control"
                                              required></p>
            <p>Анонс: <br> <textarea name="short_text" class="form-control"
                                     required><?php echo $article->short_text; ?></textarea></p>
            <p>Текст поста: <br> <textarea name="full_text" class="form-control"
                                           required><?php echo $article->full_text; ?></textarea></p>
            <button type="submit" class="btn-success">Редактировать</button>

        </form>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>