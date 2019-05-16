<?php $__env->startSection('content'); ?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/blog/img/post-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1><?php echo $contact-> title; ?></h1>
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
                    <?php echo $contact -> description; ?>

                </div>
            </div>
            <br>
            <br>
            <br>
            <h1>Форма обратной связи</h1>
            <form method="post">
                <?php echo csrf_field(); ?>

                <p>Введите ваше имя: <br> <input type="text" name="title" class="form-control" required></p>
                <p>Ваш телефон: <br> <input name="phone" class="form-control" required></p>
                <p>Ваш e-mail: <br> <input name="email" class="form-control" required></p>
                <p>Ваше сообщение: <br> <textarea name="email" class="form-control" required></textarea></p>
                <button type="submit" class="btn-success">Отправить</button>
            </form>
        </div>
    </article>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>