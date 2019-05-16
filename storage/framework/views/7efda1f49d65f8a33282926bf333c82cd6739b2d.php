<h2>Дообро пожаловать, <?php echo e(\Auth::user()->email); ?></h2>
<br>
<?php if(\Auth::user()->isAdmin == 1): ?>
    <a href="<?php echo e(route('admin')); ?>">Админка</a>
<?php endif; ?>
<br>
<a href="<?php echo e(route('logout')); ?>">Выйти</a>