@extends('layouts.app')
@section('title')
    {{ __('messages.appointments') }}
@endsection
@section('page_css')
    {{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}"> --}}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <livewire:appointment-table lazy />
        </div>
        @include('appointments.templates.templates')
        {{ Form::hidden('appointmentUrl', url('appointments'), ['class' => 'appointmentURL']) }}
        {{ Form::hidden('patientUrl', url('patients'), ['class' => 'patientAppointmentURL']) }}
        {{ Form::hidden('doctorUrl', url('doctors'), ['class' => 'doctorAppointmentURL']) }}
        {{ Form::hidden('doctorShowUrl', url('employee/doctor'), ['class' => 'doctorShowURL']) }}
        {{ Form::hidden('patientRole', Auth::user()->hasRole('Patient') ? true : false, ['class' => 'patientRole']) }}
        {{ Form::hidden('doctorRole', Auth::user()->hasRole('Doctor') ? false : true, ['class' => 'doctorRole']) }}
        {{ Form::hidden('loginDoctor', Auth::user()->hasRole('Doctor') ? true : false, ['class' => 'loginDoctor']) }}
        {{ Form::hidden('adminRole', Auth::user()->hasRole('Admin') ? true : false, ['class' => 'adminRole']) }}
        {{ Form::hidden('doctorDepartmentUrl', url('doctor-departments'), ['class' => 'doctorDepartmentURL']) }}
        {{ Form::hidden('todayAppointment', __('messages.appointment.today'), ['id' => 'todayAppointment']) }}
        {{ Form::hidden('yesterdayAppointment', __('messages.appointment.yesterday'), ['id' => 'yesterdayAppointment']) }}
        {{ Form::hidden('thisWeekAppointment', __('messages.appointment.this_week'), ['id' => 'thisWeekAppointment']) }}
        {{ Form::hidden('last7DayAppointment', __('messages.appointment.last_7_days'), ['id' => 'last7DayAppointment']) }}
        {{ Form::hidden('last30DayAppointment', __('messages.appointment.last_30_days'), ['id' => 'last30DayAppointment']) }}
        {{ Form::hidden('thisMonthAppointment', __('messages.appointment.this_month'), ['id' => 'thisMonthAppointment']) }}
        {{ Form::hidden('lastMonthAppointment', __('messages.appointment.last_month'), ['id' => 'lastMonthAppointment']) }}
        {{ Form::hidden('appointmentLang', __('messages.delete.appointment'), ['id' => 'appointmentLang']) }}
    </div>
@endsection
{{-- let appointmentUrl = "{{ url('appointments') }}"; --}}
{{-- let patientUrl = "{{ url('patients') }}"; --}}
{{-- let doctorUrl = "{{ url('doctors') }}"; --}}
{{-- let doctorShowUrl = "{{url('employee/doctor')}}"; --}}
{{-- let patientRole = "{{Auth::user()->hasRole('Patient')?true:false}}"; --}}
{{-- let doctorRole = "{{Auth::user()->hasRole('Doctor')?false:true}}"; --}}
{{-- let loginDoctor = "{{Auth::user()->hasRole('Doctor')?true:false}}"; --}}
{{-- let adminRole = "{{Auth::user()->hasRole('Admin')?true:false}}"; --}}
{{-- let doctorDepartmentUrl = "{{ url('doctor-departments') }}"; --}}
{{--    <script src="{{ asset('assets/js/plugins/daterangepicker.js') }}"></script> --}}
{{--    @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Doctor')) --}}
{{--        <script src="{{mix('assets/js/appointments/appointments.js')}}"></script> --}}
{{--    @else --}}
{{--        <script src="{{mix('assets/js/appointments/patient_appointment.js')}}"></script> --}}
{{--    @endif --}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script> --}}
