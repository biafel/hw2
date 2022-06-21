 ;

 <?php $__env->startSection('script'); ?>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
 <script src="<?php echo e(asset('js/signup.js')); ?>" defer></script>
 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('info'); ?>
        <?php echo csrf_field(); ?>
            <h1>Registrati!</h1>
            <label> <input type="text" id="nome" placeholder="Nome" name="nome" required> </label>
            <label> <input type="text" id="cognome" placeholder="Cognome" name="cognome" required> </label>
            <label> <input type="text" id="username" placeholder="Username" name="username" maxlength="50" required> </label>
            <label> <input type="password" id="password" placeholder="Password" name="password" required> </label>
            <label> <input type="email" id="email" placeholder="Email" name="email" required> </label>
            <button type="submit" name="register">Avanti</button>
            <div>Hai già un account? <a href="<?php echo e(route('login')); ?>">Accedi</a>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.log_reg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\esempio_laravel\resources\views/register.blade.php ENDPATH**/ ?>