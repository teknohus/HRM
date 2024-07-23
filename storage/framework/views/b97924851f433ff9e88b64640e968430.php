<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    

    <?php $__env->startSection('page-title'); ?>
        <?php echo e(__('Employee Anniversary')); ?>

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(__('Employee Anniversary')); ?></li>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>


    <div class="">
        <h2 class="my-2">Work Anniversaries in this Month</h2>
        <div class="my-2 d-flex flex-wrap">
            <?php if(count($anniver) != 0 ): ?>
                <?php $__currentLoopData = $anniver; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $anni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($remainingDays[$anni->id] == 0 || $remainingDays[$anni->id] > 32): ?>
                <div class="card mx-3 my-5" style="width: 12rem;">
                    <img src="<?php echo e(asset('assets/images/user/avatar.png')); ?>" class="card-img-top img-thumbnail" alt="404">
                    <div class="card-body">
                        <p class="card-text">Today is <?php echo e($anni->name); ?>'s Work Anniversary!</p>
                    </div>
                </div>
                    <?php elseif($remainingDays[$anni->id]<32): ?>
                    
                        
                    <div class="card mx-3 my-5" style="width: 12rem;">
                        <img src="<?php echo e(asset('assets/images/user/avatar.png')); ?>" class="card-img-top img-thumbnail" alt="404">
                            <div class="card-body">
                                <p class="card-text"><?php echo e($anni->name); ?>'s work anniversary is in  
                                    <?php if(isset($remainingDays[$anni->id])): ?>
                                    in <?php echo e($remainingDays[$anni->id]); ?>

                                    <?php endif; ?> days</p>
                                </div>
                    </div>
                    <?php endif; ?>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <p class="my-4">No Work Anniveray In This Month!!</p>
            <?php endif; ?>
        </div>
    </div>

    <?php $__env->stopSection(); ?>
    
</body>
</html>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teknohus/hrm/resources/views/employee/anniversary.blade.php ENDPATH**/ ?>