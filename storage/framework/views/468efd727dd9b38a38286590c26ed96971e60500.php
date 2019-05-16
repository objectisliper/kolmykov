<?php $__env->startSection('content'); ?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/blog/img/post-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1><?php echo $article -> title; ?></h1>
                        <h2 class="subheading"><?php echo $article -> short_text; ?></h2>
                        <span class="meta">Опубликовано в <?php echo $article->created_at->format('H:i d-m-Y'); ?></span>
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
                    <?php echo $article -> full_text; ?>

                </div>
            </div>
            <br>
            <br>
            <hr>
            <br>
            <?php if(\Auth::check()): ?>
                <form method="post" action="<?php echo route('comments.add'); ?>">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" value="<?php echo e($article->id); ?>" name="article_id">
                    <p>Комментарий:
                        <br>
                        <textarea class="form-control" name="comment"></textarea>
                        <br>
                        <button type="submit" class="btn btn-success">Добавить комментарий</button>
                    </p>
                </form>
            <?php endif; ?>
            <br>
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="comment" style="border:1px solid #000;">
                    <p><?php echo e(_user($comment->user_id)->email); ?></p>
                    <p><?php echo e($comment->created_at->format('d-m-Y')); ?></p>
                    <p><?php echo $comment->comment; ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </article>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>