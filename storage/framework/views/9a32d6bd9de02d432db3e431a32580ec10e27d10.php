;

<?php $__env->startSection('script'); ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
<script src="<?php echo e(asset('js/login.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('info'); ?>
        <?php echo csrf_field(); ?>
           <h1>Accedi!</h1>
           <label>Nome utente <input type='text' name='username'></label>
           <label>Password <input type='password' name='password'></label>
           <button type="submit" name="register">Accedi</button>
           <div class="signup">Non hai un account? <a href="<?php echo e(route('register')); ?>">Iscriviti</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.log_reg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\esempio_laravel\resources\views/login.blade.php ENDPATH**/ ?>