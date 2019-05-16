<?php if(session()->has('success')): ?>
    <script>
        $(function () {
            alertify.alert(" <?php echo session()->get('success'); ?>");
            alertify.success(" <?php echo session()->get('success'); ?>");
        })
    </script>
<?php elseif(session()->has('error')): ?>
    <script>
        $(function () {
            alertify.alert(" <?php echo session()->get('error'); ?>");
            alertify.error(" <?php echo session()->get('error'); ?>");
        })
    </script>
<?php elseif(session()->has('errors')): ?>
    <?php $errors = session()->get('errors'); $messages =""; ?>
    <?php $__currentLoopData = $errors->all("<p>:message</p>"); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $messages .= $message; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <script>
        $(function () {
            alertify.alert(" <?php echo $messages; ?>");
            alertify.error(" <?php echo $messages; ?>");
        })
    </script>
<?php endif; ?>