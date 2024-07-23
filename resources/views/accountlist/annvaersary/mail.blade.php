<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Celebrating Your Work Anniversary!</title>
  <style>
    /* Styling for the email */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .container {
      margin: 20px auto;
      background-image: url(https://img.freepik.com/free-vector/gold-frame-neutral-watercolor-background_53876-115585.jpg?t=st=1713868638~exp=1713872238~hmac=43f732f0cd831831fd40824101058e864df365f97c8c51971147c7d853eac6a1&w=740);
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
      width:560px;
    }
    .footer {
      margin: auto;
      width:560px;
      font-size: 14px;
      color: #777;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
        {{-- <img src="https://media.licdn.com/dms/image/C4D0BAQGs9gvMkCCDHw/company-logo_200_200/0/1679557654663/teknohus_dba_logo?e=1720051200&v=beta&t=b1QCbdPcnhMyLQBCvCYhSCK64xGHmlaBoEkm_UBG8Nk" alt="Logo" width="150"> --}}
      <h1 style="margin-top: 130px">Celebrating Your Work Anniversary!</h1>
    </div>
    <div class="message">
      <p>Dear {{ $employeeName }},</p>
      <p>Congratulations on reaching this milestone of your {{$workedYears}} year work anniversary with {{ $companyName }}! It’s been an incredible journey, and we're grateful for your dedication and hard work over the years.</p>
      <p>Your commitment and contributions have played a significant role in our success, and we look forward to many more years of collaboration and achievements together.</p>
      <p>Thank you for being an invaluable part of our team!</p>
    </div>
    <div class="footer">
      <p>Best regards,<br>HR Manager<br>{{ $companyName }}</p>
    </div>
  </div>
</body>
</html>
