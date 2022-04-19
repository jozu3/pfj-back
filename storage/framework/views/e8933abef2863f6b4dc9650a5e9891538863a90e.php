<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta name="author" content="PFJ 2022">
        <meta name="description" content="<?php echo e(config('app.description', 'Para la Fortaleza de la Juventud' )); ?>">
        <meta property="og:image" content="<?php echo e(config('app.url', 'http://localhost/').'/img/logo_pfj2022.jpg'); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link rel="shortcut icon" href="<?php echo e(asset('img/logo_pfj2022.jpg')); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'PFJ')); ?></title>
        <link rel="shortcut icon" href="<?php echo e(config('app.url', 'https://www.pfjperu.com')); ?>/favicons/favicon.ico">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(config('app.url', 'https://www.pfjperu.com').'/css/app.css'); ?>">

        <!-- Scripts -->
        <script src="<?php echo e(config('app.url', 'https://www.pfjperu.com').'/js/app.js'); ?>" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            <?php echo e($slot); ?>

        </div>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\pfj\resources\views/layouts/guest.blade.php ENDPATH**/ ?>