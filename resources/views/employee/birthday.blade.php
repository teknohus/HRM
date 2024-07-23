@php
    use Illuminate\Support\Carbon;
// use Carbon\Carbon;
@endphp
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
            @extends('layouts.admin')

            @section('page-title')
                {{ __('Employee Birthdays') }}
            @endsection

            @section('breadcrumb')
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item">{{ __('Employee Birthdays') }}</li>
            @endsection

            @section('content')
                <div class="row">
                        <h2 class="my-2">Birthdays in this Month</h2>
                        <div class="slider my-2 d-flex flex-wrap">
                            @if (count($upcomingBirthdays) != 0)

                            @foreach ($upcomingBirthdays as $id => $birthdays)
                            
                            {{-- @if ($remainingDays[$birthdays->id] == 0 || \Carbon\Carbon::parse($birthdays->dob)->isToday()) --}}
                            @if ($remainingDays[$birthdays->id] == 0 || $remainingDays[$birthdays->id] > 32)
                                <div class="card mx-3 my-5" style="width: 12rem;">
                                    <img src="{{ asset('assets/images/user/avatar.png')}}" class="card-img-top img-thumbnail" alt="404">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $birthdays->name }}</h5>
                                        <p class="card-text">Today is {{ $birthdays->name }}'s birthday!</p>
                                    </div>
                                </div>
                            @elseif($remainingDays[$birthdays->id])
                                <div class="card mx-3 my-5" style="width: 12rem;">
                                    <img src="{{ asset('assets/images/user/avatar.png')}}" class="card-img-top img-thumbnail" alt="404">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $birthdays->name }}</h5>
                                        <p class="card-text">{{ $birthdays->name }}'s birthday is 
                                            @if (isset($remainingDays[$birthdays->id]))
                                                in {{ $remainingDays[$birthdays->id] }}
                                            @endif days</p>
                                    </div>
                                </div>
                                @endif
                            @endforeach

                            @else
                            <div class="mx-3 my-5">
                                <p>There is no upcoming birthday in this month!!</p>
                            </div>
                            @endif                            
                        </div>
                </div>
                <div class="row">
                    <h2 class="my-2">Birthdays in next Month</h2>
                    <div class="slider my-2 d-flex flex-wrap">
                        @if (count($nextMonth) != 0)
                            @foreach ($nextMonth as $id => $birthdays)
                            
                            <div class="card mx-3 my-5" style="width: 12rem;">
                                <img src="{{ asset('assets/images/user/avatar.png')}}" class="card-img-top img-thumbnail" alt="404">
                                <div class="card-body">
                                <h5 class="card-title">{{ $birthdays->name }}</h5>
                                <p class="card-text">{{ $birthdays->dob }}</p>
                                </div>
                            </div>
                                
                            @endforeach
                        @else
                        <p>There is no upcoming birthday!!</p>
                        @endif
                    </div>
            </div>

            @endsection

            
    
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





