<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La tua libreria</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/libreria.css')); ?>"/>
    <script src="js/preferiti.js" defer="true" ></script>
</head>
<body>
    <nav>
        <div id="titolo">
                <img class="logo" src="img/Logo.png"/>
                SoundTrip  
            </div>
        <div id="links">
            <a href="<?php echo e(route('home')); ?>">Home</a>      
        </div>
    </nav>
<section>
    <div id="embed-iframe"></div> 
    <script src="https://open.spotify.com/embed-podcast/iframe-api/v1" async></script>
    <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1Epy1tHJSLxhr0?utm_source=generator" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
    
    <h1> Ultimi ascolti</h1>
    <div class="flex-container" id="ultimi_ascolti">
        <?php $__currentLoopData = $last; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $last_song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="flex-item">
            <a href="<?php echo e($last_song->url); ?>" target="_blank">
                <img src="<?php echo e($last_song->img); ?>">
            </a>
            
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <h1> Brani preferiti </h1>
    <div class="flex-container" id="preferiti">
        <?php $__currentLoopData = $fav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fav_song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="flex-item">
            <img src="img/cuore_pieno.png" id="onlick_remove">
            <a href="<?php echo e($fav_song->url); ?>" target="_blank">
                <img src="<?php echo e($fav_song->img); ?>">
            </a>
            
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    
    <h1> Allenamento</h1>
    <div class="flex-container">
        <div class="flex-item"> 
        <a href="https://open.spotify.com/track/46nvQpUDsxpS08UTFOeKTA?si=fb516a982377445c" > <img src="img/1.png"> </a>
        </div>
        <div class="flex-item">
        <a href="https://open.spotify.com/track/2prnn41CblB8B4yWACDljP?si=33de932c524b4cd5" > <img src="img/2.png"> </a>
        </div>
        <div class="flex-item">       
        <a href="https://open.spotify.com/track/20on25jryn53hWghthWWW3?si=c18074ad18c04d8e" > <img src="img/3.png"> </a>
        </div>  
        <div class="flex-item">
        <a href="https://open.spotify.com/track/0SyxZC4wlqAwf20cHE6Xon?si=2480e55cdfb94754" > <img src="img/4.png"> </a>
        </div>
        <div class="flex-item">
        <a href="https://open.spotify.com/track/2dGiKnFEOev9qyDvW8bAMq?si=634cedfb50c14794" > <img src="img/5.png"> </a>
        </div>
        <div class="flex-item">    
        <a href="https://open.spotify.com/track/5gwLIRjGFf3hXuHoKEsWLg?si=d5fc6760dde644c3" > <img src="img/6.png"> </a>
        </div> 
    </div>
    
    <h1> Mix Pop </h1>
    <div class="flex-container">
    <div class="flex-item"> 
        <img src="img/7.png"> <a href="https://open.spotify.com/track/4rHZZAmHpZrA3iH5zx8frV?si=eea557cfe2cf4a04" >  </a>
        </div>
        <div class="flex-item">
        <a href="https://open.spotify.com/track/4Dvkj6JhhA12EX05fT7y2e?si=88d8b89825c04f4a" > <img src="img/8.png"> </a>
        </div>
        <div class="flex-item">       
        <a href="https://open.spotify.com/track/1oFAF1hdPOickyHgbuRjyX?si=731bbf569d454c0a" > <img src="img/9.png"> </a>
        </div>  
        <div class="flex-item">
        <a href="https://open.spotify.com/track/6Uj1ctrBOjOas8xZXGqKk4?si=cae1373fb1f04103" > <img src="img/10.png"> </a>
        </div>
        <div class="flex-item">
        <a href="https://open.spotify.com/track/0VO8gYVDSwM1Qdd2GsMoYK?si=bc4d264e47034a6b" > <img src="img/11.png"> </a>
        </div>
        <div class="flex-item">    
        <a href="https://open.spotify.com/track/6ic8OlLUNEATToEFU3xmaH?si=63483774eb9640c9" > <img src="img/12.png"> </a>
        </div> 
    </div>
</section>
<footer>
     <address>
         Bianca Felis<br>
         1000001839
     </address>
    </footer>
    </body>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\esempio_laravel\resources\views/libreria.blade.php ENDPATH**/ ?>