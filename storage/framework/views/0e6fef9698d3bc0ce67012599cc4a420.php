<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 600px;
      margin: 20px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    }
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    .message {
      margin-bottom: 20px;
    }
    .footer {
      margin-top: 20px;
      font-size: 14px;
      color: #777;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="my-2">Birthdays in this Month</h2>
    <div class="modal-body">
        <?php $__currentLoopData = $popup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $birthday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($popupremain[$birthday->id] == 0 || $popupremain[$birthday->id] >32 ): ?>
                <p class="card-text">Today is <?php echo e($birthday->name); ?>'s birthday!</p>
            <?php elseif($popupremain[$birthday->id]< 32): ?>
                <p class="card-text"><?php echo e($birthday->name); ?>'s birthday is in
                    <?php if(isset($popupremain[$birthday->id])): ?>
                        in <?php echo e($popupremain[$birthday->id]); ?>

                    <?php endif; ?> days</p>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if(count($anniversarypopup) != 0): ?>
                    <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">Work Anniversaries </h2>
                    </div>
                    <div class="modal-body">
                        <?php $__currentLoopData = $anniversarypopup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anniver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($popupanniversarypopupremain[$anniver->id]  == 0 || $popupanniversarypopupremain[$anniver->id]  >32): ?>
                                <p class="card-text">Today is <?php echo e($anniver->name); ?>'s Work Anniversary!</p>
                            <?php elseif($popupanniversarypopupremain[$anniver->id] < 32): ?>
                                <p class="card-text"><?php echo e($anniver->name); ?>'s work anniversary is in  
                                    <?php if(isset($popupanniversarypopupremain[$anniver->id])): ?>
                                    in <?php echo e($popupanniversarypopupremain[$anniver->id]); ?>

                                <?php endif; ?> days</p>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
    </div>
  </div>
</body>
</html>
<?php /**PATH /home/teknohus/hrm/resources/views/HRmail/hr.blade.php ENDPATH**/ ?>