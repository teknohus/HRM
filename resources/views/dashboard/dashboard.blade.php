{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@extends('layouts.admin')

@section('page-title')
    {{ __('Dashboard') }}
@endsection
@php
    $setting = App\Models\Utility::settings();   
@endphp
@section('content')

    @if(session('show_modal'))
        <script type="text/javascript">
            $(document).ready(function() {
                $('#birthday-popup').modal('show');
                $('#employee_popup').modal('show');
            });
        </script>
        {{ session()->forget('show_modal') }}
    @endif

@if (\Auth::user()->type == 'employee')  
    @if((!empty($birthday) &&  $birthday != null && $birthday != 'false') || (!empty($workedYears) &&  $workedYears != 0) || ($probation == 'true'))
        {{-- @php dd($birthday ,$workedYears, $probation ); @endphp --}}
        <div class="modal fade" id="employee_popup" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content" style="  background-image: url('https://img.freepik.com/free-photo/pink-balloons-with-copy-space_23-2148992998.jpg?t=st=1716466521~exp=1716470121~hmac=e48468a0efb40e9ddf96d8257eb83b952f72980c329d01f5f3ed8dd2bed740cc&w=826');background-size:cover;background-repeat: no-repeat; background-position: center;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hi {{$emID->name}}!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @if(!empty($birthday) && $birthday != null)
                            <div class="modal-body">
                                <h5 class="modal-title" id="exampleModalLabel">Happy Birthday🎂</h5>
                            </div>
                    @endif
                    @if($workedYears != 0)
                        <div class="modal-body">
                            <h5 class="modal-title" id="exampleModalLabel">Happy Anniversary 🎉</h5>
                            @if($workedYears == 1)
                                    <h5 class="modal-title my-2" id="exampleModalLabel">Celebrating Your {{$workedYears}}st Anniversary </h5>
                            @elseif($workedYears == 2)
                                    <h5 class="modal-title my-2" id="exampleModalLabel">Celebrating Your {{$workedYears}}nd Anniversary </h5>
                            @elseif($workedYears == 3)
                                    <h5 class="modal-title my-2" id="exampleModalLabel">Celebrating Your {{$workedYears}}rd Anniversary </h5>
                            @else
                                    <h5 class="modal-title my-2" id="exampleModalLabel">Celebrating Your {{$workedYears}}th Anniversary </h5>
                            @endif
                        </div>
                    @endif
                    @if ($probation == 'true')
                        <div class="modal-body">
                            <h5 class="modal-title" id="exampleModalLabel">Your Probation is Ending Today</h5>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
  @endif
@endif
@if (\Auth::user()->type == 'company' || \Auth::user()->type == 'hr')
    @if((!empty($popup) && $popup != null) || ($anniversaryworked !=0) || (!empty($probation) && $probation != null))
     {{-- @php dd($popup ,$anniversaryworked, $probation ); @endphp --}}
        <div class="modal fade"  tabindex="-1" id="birthday-popup" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content" style="  background-image: url('https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdHAyMDYtMjMuanBn.jpg');background-size:cover;background-repeat: no-repeat; background-position: center;">
                @if (is_array($popup) || count($popup) != 0)
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upcoming Birthdays in this Month</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($popup as $birthday)
                            @if ($popupremain[$birthday->id] == 0 || $popupremain[$birthday->id] >32 )
                                <p class="card-text">Today is {{ $birthday->name }}'s birthday!</p>
                            @elseif($popupremain[$birthday->id]< 32)
                                <p class="card-text">{{ $birthday->name }}'s birthday is
                                    @if (isset($popupremain[$birthday->id]))
                                        in {{ $popupremain[$birthday->id] }}
                                    @endif days</p>
                            @endif
                        @endforeach
                    </div>
                @else
                        <div class="mx-3 my-5 d-flex justify-content-between">
                            <h4>There is no upcoming birthdays in this month</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                @endif
                @if($anniversaryworked !=0)
                    @if (count($anniversarypopup) != 0)
                        <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Upcoming Work Anniversaries</h5>
                        </div>
                        <div class="modal-body">
                                @foreach ($anniversarypopup as $anniver)
                                    @if ($popupanniversarypopupremain[$anniver->id]  == 0 || $popupanniversarypopupremain[$anniver->id]  >32)
                                        
                                            <p class="card-text">Today is {{ $anniver->name }}'s Work Anniversary!</p>
                                    
                                    @elseif($popupanniversarypopupremain[$anniver->id] < 32)
                                        <p class="card-text">{{ $anniver->name }}'s work anniversary is 
                                            @if (isset($popupanniversarypopupremain[$anniver->id]))
                                            in {{ $popupanniversarypopupremain[$anniver->id] }}
                                        @endif days</p>
                                    @endif
                                @endforeach
                        </div>
                    @endif
                @endif
                @foreach ($probation as $pro)
                    @php
                        $employeeName = $pro_names[$pro->user_id];
                        $probationDate = \Carbon\Carbon::parse($pro->probation);
                    @endphp
                        @if ( $probationDate->gte(\Carbon\Carbon::today()))
                            <div class="modal-body">
                                <p><b>{{ $employeeName }}'s </b>probation ending this month on: {{ \Carbon\Carbon::parse($pro->probation)->format('d') }}</p>
                            </div>
                        @endif
                    @endforeach
            </div>
            </div>
            </div>
        </div>
    @endif
@endif

    <div class="row">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        

        @if (\Auth::user()->type == 'employee')
            <div class="col-xxl-6">
                <div class="card" style="height: 230px;">
                    <div class="card-header">
                        <h5>{{ __('Mark Attandance') }}</h5>
                    </div>
                    <div class="card-body">
                        {{-- <p class="text-muted pb-0-5">
                            {{ __('My Office Time: ' . $officeTime['startTime'] . ' to ' . $officeTime['endTime']) }}</p> --}}
                            <p> You can do multiple clock-ins and clock-outs every day.</p>
                            <p>Worked hours today: @if(!empty($totalWorkingHours) && $totalWorkingHours != '00:00:00') 
                                {{ $totalWorkingHours }} 
                            @else 
                                00:00:00 
                            @endif</p>
                        <div class="row">
                            <div class="col-md-6 float-right border-right">
                                {{ Form::open(['url' => 'attendanceemployee/attendance', 'method' => 'post']) }}
                                @if (empty($employeeAttendance) )
                                    <button type="submit" value="0" name="in" id="clock_in"
                                        class="btn btn-primary">{{ __('CLOCK IN') }}</button>
                                @else
                                    <button type="submit" value="0" name="in" id="clock_in"
                                        class="btn btn-primary" >{{ __('CLOCK IN') }}</button>
                                @endif
                                {{ Form::close() }}
                            </div>
                            <div class="col-md-6 float-left">
                                @if (!empty($employeeAttendance) && $employeeAttendance->clock_out == '00:00:00')
                                    {{ Form::model($employeeAttendance, ['route' => ['attendanceemployee.update', $employeeAttendance->id], 'method' => 'PUT']) }}
                                    <button type="submit" value="0" name="out" id="clock_out"
                                        class="btn btn-danger">{{ __('CLOCK OUT') }}</button>
                                {{-- @else
                                    <button type="submit" value="1" name="out" id="clock_out"
                                        class="btn btn-danger">{{ __('aaa') }}</button> --}}
                                @endif
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5>{{ __('Calendar') }}</h5>
                                <input type="hidden" id="path_admin" value="{{ url('/') }}">
                            </div>
                            <div class="col-lg-6">
                                {{-- <div class="form-group"> --}}
                                <label for=""></label>
                                @if (isset($setting['is_enabled']) && $setting['is_enabled'] == 'on')
                                    <select class="form-control" name="calender_type" id="calender_type"
                                        style="float: right;width: 155px;" onchange="get_data()">
                                        <option value="google_calender">{{ __('Google Calendar') }}</option>
                                        <option value="local_calender" selected="true">
                                            {{ __('Local Calendar') }}</option>
                                    </select>
                                @endif
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id='event_calendar' class='calendar'></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6">
              
                <div class="card" style="height: 402px;">
                    <div class="card-header card-body table-border-style">
                        <h5>{{ __('Meeting schedule') }}</h5>
                    </div>
                    <div class="card-body" style="height: 320px">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Meeting title') }}</th>
                                        <th>{{ __('Meeting Date') }}</th>
                                        <th>{{ __('Meeting Time') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($meetings as $meeting)
                                        <tr>
                                            <td>{{ $meeting->title }}</td>
                                            <td>{{ \Auth::user()->dateFormat($meeting->date) }}</td>
                                            <td>{{ \Auth::user()->timeFormat($meeting->time) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-body table-border-style">
                        <h5>{{ __('Announcement List') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Start Date') }}</th>
                                        <th>{{ __('End Date') }}</th>
                                        <th>{{ __('Description') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($announcements as $announcement)
                                        <tr>
                                            <td>{{ $announcement->title }}</td>
                                            <td>{{ \Auth::user()->dateFormat($announcement->start_date) }}</td>
                                            <td>{{ \Auth::user()->dateFormat($announcement->end_date) }}</td>
                                            <td>{{ $announcement->description }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-xxl-12">

                {{-- start --}}
                <div class="row">

                    <div class="col-lg-4 col-md-6">

                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mb-3 mb-sm-0">
                                        <div class="d-flex align-items-center">
                                            <div class="theme-avtar bg-primary">
                                                <i class="ti ti-users"></i>
                                            </div>
                                            <div class="ms-3">
                                                <small class="text-muted">{{ __('Total') }}</small>
                                                <h6 class="m-0">{{ __('Staff') }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto text-end">
                                        <h4 class="m-0 text-primary">{{ $countUser + $countEmployee }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">

                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mb-3 mb-sm-0">
                                        <div class="d-flex align-items-center">
                                            <div class="theme-avtar bg-info">
                                                <i class="ti ti-ticket"></i>
                                            </div>
                                            <div class="ms-3">
                                                <small class="text-muted">{{ __('Total') }}</small>
                                                <h6 class="m-0">{{ __('Tasks') }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto text-end">
                                        <h4 class="m-0 text-info"> {{ $countTicket }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">

                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mb-3 mb-sm-0">
                                        <div class="d-flex align-items-center">
                                            <div class="theme-avtar bg-warning">
                                                <i class="ti ti-wallet"></i>
                                            </div>
                                            <div class="ms-3">
                                                <small class="text-muted">{{ __('Total') }}</small>
                                                <h6 class="m-0">{{ __('Account Balance') }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto text-end">
                                        <h4 class="m-0 text-warning">{{ \Auth::user()->priceFormat($accountBalance) }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mb-3 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <div class="theme-avtar bg-primary">
                                        <i class="ti ti-cast"></i>
                                    </div>
                                    <div class="ms-3">
                                        <small class="text-muted">{{ __('Total') }}</small>
                                        <h6 class="m-0">{{ __('Jobs') }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <h4 class="m-0 text-primary">{{ $activeJob + $inActiveJOb }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-6">

                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mb-3 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <div class="theme-avtar bg-info">
                                        <i class="ti ti-cast"></i>
                                    </div>
                                    <div class="ms-3">
                                        <small class="text-muted">{{ __('Total') }}</small>
                                        <h6 class="m-0">{{ __('Active Jobs') }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <h4 class="m-0 text-info"> {{ $activeJob }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">

                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mb-3 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <div class="theme-avtar bg-warning">
                                        <i class="ti ti-cast"></i>
                                    </div>
                                    <div class="ms-3">
                                        <small class="text-muted">{{ __('Total') }}</small>
                                        <h6 class="m-0">{{ __('Inactive Jobs') }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <h4 class="m-0 text-warning">{{ $inActiveJOb }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- </div> --}}

            {{-- end --}}
            <div class="col-xxl-12">
                <div class="row">
                    <div class="col-xl-5">

                        @if (\Auth::user()->type == 'company')
                            <div class="card">
                                <div class="card-header card-body table-border-style">
                                    <h5>{{ __('Storage Status') }} <small>({{ $users->storage_limit . 'MB' }} /
                                            {{ $plan->storage_limit . 'MB' }})</small></h5>
                                </div>
                                <div class="card-body" style="height: 324px; overflow:auto">
                                    <div class="card shadow-none mb-0">
                                        <div class="card-body border rounded  p-3">
                                            <div id="device-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header card-body table-border-style">
                                <h5>{{ __('Meeting schedule') }}</h5>
                            </div>
                            <div class="card-body" style="height: 324px; overflow:auto">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Date') }}</th>
                                                <th>{{ __('Time') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($meetings as $meeting)
                                                <tr>
                                                    <td>{{ $meeting->title }}</td>
                                                    <td>{{ \Auth::user()->dateFormat($meeting->date) }}</td>
                                                    <td>{{ \Auth::user()->timeFormat($meeting->time) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header card-body table-border-style">
                                <h5>{{ __("Today's Not Clock In") }}</h5>
                            </div>
                            <div class="card-body" style="height: 324px; overflow:auto">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($notClockIns as $notClockIn)
                                                <tr>
                                                    <td>{{ $notClockIn->name }}</td>
                                                    <td><span class="absent-btn">{{ __('Absent') }}</span></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>{{ __('Calendar') }}</h5>
                                        <input type="hidden" id="path_admin" value="{{ url('/') }}">
                                    </div>
                                    <div class="col-lg-6">
                                        {{-- <div class="form-group"> --}}
                                        <label for=""></label>
                                        @if (isset($setting['is_enabled']) && $setting['is_enabled'] == 'on')
                                            <select class="form-control" name="calender_type" id="calender_type"
                                                style="float: right;width: 155px;" onchange="get_data()">
                                                <option value="google_calender">{{ __('Google Calendar') }}</option>
                                                <option value="local_calender" selected="true">
                                                    {{ __('Local Calendar') }}</option>
                                            </select>
                                        @endif
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card-635 ">
                                <div id='calendar' class='calendar'></div>
                            </div>
                        </div>

                        @if (\Auth::user()->type == 'company')
                            <div class="card">
                                <div class="card-header card-body table-border-style">
                                    <h5>{{ __('Announcement List') }}</h5>
                                </div>
                                <div class="card-body" style="height: 324px; overflow:auto">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('Title') }}</th>
                                                    <th>{{ __('Start Date') }}</th>
                                                    <th>{{ __('End Date') }}</th>
                                                    <th>{{ __('Description') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @foreach ($announcements as $announcement)
                                                    <tr>
                                                        <td>{{ $announcement->title }}</td>
                                                        <td>{{ \Auth::user()->dateFormat($announcement->start_date) }}</td>
                                                        <td>{{ \Auth::user()->dateFormat($announcement->end_date) }}</td>
                                                        <td>{{ $announcement->description }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            @if (\Auth::user()->type != 'company')
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header card-body table-border-style">
                            <h5>{{ __('Announcement List') }}</h5>
                        </div>
                        <div class="card-body" style="height: 270px; overflow:auto">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Title') }}</th>
                                            <th>{{ __('Start Date') }}</th>
                                            <th>{{ __('End Date') }}</th>
                                            <th>{{ __('Description') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach ($announcements as $announcement)
                                            <tr>
                                                <td>{{ $announcement->title }}</td>
                                                <td>{{ \Auth::user()->dateFormat($announcement->start_date) }}</td>
                                                <td>{{ \Auth::user()->dateFormat($announcement->end_date) }}</td>
                                                <td>{{ $announcement->description }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>
@endsection



@push('script-page')
    <script src="{{ asset('assets/js/plugins/main.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>

    @if (Auth::user()->type == 'company' || Auth::user()->type == 'hr')
        <script type="text/javascript">
            $(document).ready(function() {
                get_data();
            });

            function get_data() {
                var calender_type = $('#calender_type :selected').val();

                $('#calendar').removeClass('local_calender');
                $('#calendar').removeClass('google_calender');
                if (calender_type == undefined) {
                    calender_type = 'local_calender';
                }
                $('#calendar').addClass(calender_type);

                $.ajax({
                    url: $("#path_admin").val() + "/event/get_event_data",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'calender_type': calender_type
                    },
                    success: function(data) {

                        var etitle;
                        var etype;
                        var etypeclass;
                        var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                            headerToolbar: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'dayGridMonth,timeGridWeek,timeGridDay'
                            },
                            buttonText: {
                                timeGridDay: "{{ __('Day') }}",
                                timeGridWeek: "{{ __('Week') }}",
                                dayGridMonth: "{{ __('Month') }}"
                            },
                            // slotLabelFormat: {
                            //     hour: '2-digit',
                            //     minute: '2-digit',
                            //     hour12: false,
                            // },
                            themeSystem: 'bootstrap',
                            slotDuration: '00:10:00',
                            allDaySlot: true,
                            navLinks: true,
                            droppable: true,
                            selectable: true,
                            selectMirror: true,
                            editable: true,
                            dayMaxEvents: true,
                            handleWindowResize: true,
                            events: data,
                            // height: 'auto',
                            // timeFormat: 'H(:mm)',
                        });
                        calendar.render();
                    }
                });
            };
        </script>
    @else
        <script>
            $(document).ready(function() {
                get_data();
            });

            function get_data() {
                var calender_type = $('#calender_type :selected').val();

                $('#event_calendar').removeClass('local_calender');
                $('#event_calendar').removeClass('google_calender');
                if (calender_type == undefined) {
                    calender_type = 'local_calender';
                }
                $('#event_calendar').addClass(calender_type);

                $.ajax({
                    url: $("#path_admin").val() + "/event/get_event_data",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'calender_type': calender_type
                    },
                    success: function(data) {
                        var etitle;
                        var etype;
                        var etypeclass;
                        var calendar = new FullCalendar.Calendar(document.getElementById('event_calendar'), {
                            headerToolbar: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'dayGridMonth,timeGridWeek,timeGridDay'
                            },
                            buttonText: {
                                timeGridDay: "{{ __('Day') }}",
                                timeGridWeek: "{{ __('Week') }}",
                                dayGridMonth: "{{ __('Month') }}"
                            },
                            // slotLabelFormat: {
                            //     hour: '2-digit',
                            //     minute: '2-digit',
                            //     hour12: false,
                            // },
                            themeSystem: 'bootstrap',
                            slotDuration: '00:10:00',
                            allDaySlot: true,
                            navLinks: true,
                            droppable: true,
                            selectable: true,
                            selectMirror: true,
                            editable: true,
                            dayMaxEvents: true,
                            handleWindowResize: true,
                            events: data,
                            // height: 'auto',
                            // timeFormat: 'H(:mm)',

                        });

                        calendar.render();
                    }
                });
            };
        </script>
    @endif

    @if (\Auth::user()->type == 'company')
        <script>
            (function() {
                var options = {
                    series: [{{ round($storage_limit,2) }}],
                    chart: {
                        height: 350,
                        type: 'radialBar',
                        offsetY: -20,
                        sparkline: {
                            enabled: true
                        }
                    },
                    plotOptions: {
                        radialBar: {
                            startAngle: -90,
                            endAngle: 90,
                            track: {
                                background: "#e7e7e7",
                                strokeWidth: '97%',
                                margin: 5, // margin is in pixels
                            },
                            dataLabels: {
                                name: {
                                    show: true
                                },
                                value: {
                                    offsetY: -50,
                                    fontSize: '20px'
                                }
                            }
                        }
                    },
                    grid: {
                        padding: {
                            top: -10
                        }
                    },
                    colors: ["#6FD943"],
                    labels: ['Used'],
                };
                var chart = new ApexCharts(document.querySelector("#device-chart"), options);
                chart.render();
            })();
        </script>
    @endif

@endpush
