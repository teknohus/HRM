<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    @extends('layouts.admin')

    @section('page-title')
        {{ __('Employee Anniversary') }}
    @endsection

    @section('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item">{{ __('Employee Anniversary') }}</li>
    @endsection

    @section('content')


    <div class="">
        <h2 class="my-2">Work Anniversaries in this Month</h2>
        <div class="my-2 d-flex flex-wrap">
            @if (count($anniver) != 0 )
                @foreach ($anniver as $id => $anni)
                @if ($remainingDays[$anni->id] == 0 || $remainingDays[$anni->id] > 32)
                <div class="card mx-3 my-5" style="width: 12rem;">
                    <img src="{{ asset('assets/images/user/avatar.png')}}" class="card-img-top img-thumbnail" alt="404">
                    <div class="card-body">
                        <p class="card-text">Today is {{ $anni->name }}'s Work Anniversary!</p>
                    </div>
                </div>
                    @elseif($remainingDays[$anni->id]<32)
                    {{-- @if($remainingDays[$anni->id]<32 && $remainingDays[$anni->id]!=0) --}}
                        {{-- @if($remainingDays[$anni->id]) --}}
                    <div class="card mx-3 my-5" style="width: 12rem;">
                        <img src="{{ asset('assets/images/user/avatar.png')}}" class="card-img-top img-thumbnail" alt="404">
                            <div class="card-body">
                                <p class="card-text">{{ $anni->name }}'s work anniversary is in  
                                    @if (isset($remainingDays[$anni->id]))
                                    in {{ $remainingDays[$anni->id] }}
                                    @endif days</p>
                                </div>
                    </div>
                    @endif
                
                @endforeach
            @else
            <p class="my-4">No Work Anniveray In This Month!!</p>
            @endif
        </div>
    </div>

    @endsection
    
</body>
</html>