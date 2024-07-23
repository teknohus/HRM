<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Happy Birthday!</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .container {
      margin: 20px auto;
      background-image: url(https://img.freepik.com/free-vector/new-year-gift-boxes-ballon-with-shimmering-star-lights-frame-design-vector_53876-161421.jpg?w=740&t=st=1713867129~exp=1713867729~hmac=f65b62fb17caf5e0e0cb29ee4c7851f97ea0ae66007711b8a2b44586f5bb4333);
      background-repeat:no-repeat ;
      background-origin: center;
      background-size: cover;
      padding: 20px;
      border-radius: 10px;
    }
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    .message {
      margin: auto;
      margin-bottom: 20px;
      width:555px;
    }
    .footer {
      margin: auto;
      width:555px;
      font-size: 14px;
      color: #777;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      
      <h1 style="margin-top: 100px">Happy Birthday <?php echo e($employeeName); ?>! 🎂</h1>
    </div>
    <div class="message">
      <p>Dear <?php echo e($employeeName); ?>,</p>
      <p>We value your special day just as much as we value you. On your birthday, we send you our warmest and most heartfelt wishes.We are thrilled to be able to share this great day with you, and glad to have you as a valuable member of the team. We appreciate everything you’ve done to help us flourish and grow.</p>
      <p>Thank you for your hard work and dedication to our company. Your contributions are truly appreciated.</p>
      <p>Enjoy your special day to the fullest!</p>
    </div>
    <div class="footer">
        <p>Best regards,<br> HR Manager<br><?php echo e($companyName); ?></p>
    </div>
  </div>
</body>
</html>
<?php /**PATH /home/teknohus/hrm/resources/views/birthday/mail.blade.php ENDPATH**/ ?>