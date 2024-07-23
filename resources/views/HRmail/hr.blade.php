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
        @foreach ($popup as $birthday)
            @if ($popupremain[$birthday->id] == 0 || $popupremain[$birthday->id] >32 )
                <p class="card-text">Today is {{ $birthday->name }}'s birthday!</p>
            @elseif($popupremain[$birthday->id]< 32)
                <p class="card-text">{{ $birthday->name }}'s birthday is in
                    @if (isset($popupremain[$birthday->id]))
                        in {{ $popupremain[$birthday->id] }}
                    @endif days</p>
            @endif
        @endforeach
        @if (count($anniversarypopup) != 0)
                    <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">Work Anniversaries </h2>
                    </div>
                    <div class="modal-body">
                        @foreach ($anniversarypopup as $anniver)
                            @if ($popupanniversarypopupremain[$anniver->id]  == 0 || $popupanniversarypopupremain[$anniver->id]  >32)
                                <p class="card-text">Today is {{ $anniver->name }}'s Work Anniversary!</p>
                            @elseif($popupanniversarypopupremain[$anniver->id] < 32)
                                <p class="card-text">{{ $anniver->name }}'s work anniversary is in  
                                    @if (isset($popupanniversarypopupremain[$anniver->id]))
                                    in {{ $popupanniversarypopupremain[$anniver->id] }}
                                @endif days</p>
                            @endif
                        @endforeach
                    </div>
                @endif
    </div>
  </div>
</body>
</html>
