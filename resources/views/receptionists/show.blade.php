@extends('layouts.app')
@section('title')
    {{__('messages.receptionist.receptionist_details')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <div class="text-end mt-4 mt-md-0">
                <a href="{{ route('receptionists.edit',['receptionist' => $receptionist->id]) }}"
                   class="btn btn-primary {{getloggedInUser()->language == 'ar' ? 'ms-2' : 'me-2'}} edit-btn">{{ __('messages.common.edit') }}
                </a>
                <a href="{{ route('receptionists.index') }}"
                   class="btn btn-outline-primary {{ getloggedInUser()->language == 'ar' ? 'me-2' : 'ms-2'}}">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('flash::message')
                </div>
            </div>
                @include('receptionists.show_fields')
        </div>
    </div>
@endsection
@section('page_scripts')
{{--    <script src="{{ mix('assets/js/receptionists/receptionists_data_listing.js') }}"></script>--}}
@endsection
