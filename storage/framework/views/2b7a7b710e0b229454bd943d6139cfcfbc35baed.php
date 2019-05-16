<?php $__env->startSection('content'); ?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/blog/img/post-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1><?php echo $tag -> title; ?></h1>
                        <h2 class="subheading"><?php echo $tag -> short_text; ?></h2>
                        <span class="meta">Опубликовано в <?php echo $tag->created_at->format('H:i d-m-Y'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="post-preview">
                    <a href="<?php echo route('blog.show', [
                    'category' => str_slug($article->categories->first()->title),
                    'id' => $article->id,
                    'slug' => str_slug($article->title)
                    ]); ?>">
                        <h2 class="post-title">
                            <?php echo $article->title; ?>

                        </h2>
                        <h3 class="post-subtitle">
                            <?php echo $article->short_text; ?>

                        </h3>
                    </a>
                    <p class="post-meta">Теги:<?php $__currentLoopData = $article->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><a href="<?php echo route('articles.tag.show', [
                                        'id' => $tag->id,
                                        ]); ?>"><?php echo $tag->title; ?></a>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></p>

                    <p class="post-meta">Опубликовано в <?php echo $article->created_at->format('H:i d-m-Y'); ?></p>
                </div>
                <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </article>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>