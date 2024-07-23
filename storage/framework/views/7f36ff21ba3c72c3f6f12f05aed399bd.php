<?php
    use Illuminate\Support\Carbon;
// use Carbon\Carbon;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
            

            <?php $__env->startSection('page-title'); ?>
                <?php echo e(__('Employee Birthdays')); ?>

            <?php $__env->stopSection(); ?>

            <?php $__env->startSection('breadcrumb'); ?>
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                <li class="breadcrumb-item"><?php echo e(__('Employee Birthdays')); ?></li>
            <?php $__env->stopSection(); ?>

            <?php $__env->startSection('content'); ?>
                <div class="row">
                        <h2 class="my-2">Birthdays in this Month</h2>
                        <div class="slider my-2 d-flex flex-wrap">
                            <?php if(count($upcomingBirthdays) != 0): ?>

                            <?php $__currentLoopData = $upcomingBirthdays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $birthdays): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            
                            <?php if($remainingDays[$birthdays->id] == 0 || $remainingDays[$birthdays->id] > 32): ?>
                                <div class="card mx-3 my-5" style="width: 12rem;">
                                    <img src="<?php echo e(asset('assets/images/user/avatar.png')); ?>" class="card-img-top img-thumbnail" alt="404">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($birthdays->name); ?></h5>
                                        <p class="card-text">Today is <?php echo e($birthdays->name); ?>'s birthday!</p>
                                    </div>
                                </div>
                            <?php elseif($remainingDays[$birthdays->id]): ?>
                                <div class="card mx-3 my-5" style="width: 12rem;">
                                    <img src="<?php echo e(asset('assets/images/user/avatar.png')); ?>" class="card-img-top img-thumbnail" alt="404">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($birthdays->name); ?></h5>
                                        <p class="card-text"><?php echo e($birthdays->name); ?>'s birthday is 
                                            <?php if(isset($remainingDays[$birthdays->id])): ?>
                                                in <?php echo e($remainingDays[$birthdays->id]); ?>

                                            <?php endif; ?> days</p>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php else: ?>
                            <div class="mx-3 my-5">
                                <p>There is no upcoming birthday in this month!!</p>
                            </div>
                            <?php endif; ?>                            
                        </div>
                </div>
                <div class="row">
                    <h2 class="my-2">Birthdays in next Month</h2>
                    <div class="slider my-2 d-flex flex-wrap">
                        <?php if(count($nextMonth) != 0): ?>
                            <?php $__currentLoopData = $nextMonth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $birthdays): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <div class="card mx-3 my-5" style="width: 12rem;">
                                <img src="<?php echo e(asset('assets/images/user/avatar.png')); ?>" class="card-img-top img-thumbnail" alt="404">
                                <div class="card-body">
                                <h5 class="card-title"><?php echo e($birthdays->name); ?></h5>
                                <p class="card-text"><?php echo e($birthdays->dob); ?></p>
                                </div>
                            </div>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <p>There is no upcoming birthday!!</p>
                        <?php endif; ?>
                    </div>
            </div>

            <?php $__env->stopSection(); ?>

            
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.slider').slick({
      infinite: true,
      slidesToShow: 2,
      slidesToScroll: 1
    });
    
    </script>
</body>
</html>






<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teknohus/hrm/resources/views/employee/birthday.blade.php ENDPATH**/ ?>