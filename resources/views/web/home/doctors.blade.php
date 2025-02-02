@extends('web.layouts.front')
@section('title')
    {{ __('messages.doctors') }}
@endsection
@section('content')
    <div class="doctors-page">
        <!-- start hero section -->
        <section class="hero-section position-relative p-t-60 border-bottom-right-rounded border-bottom-left-rounded bg-gray overflow-hidden">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-center {{App::getLocale() == 'ar' ? 'text-lg-end' : 'text-lg-start'}}">
                        <div class="hero-content">
                            <h1 class="mb-3 pb-1">
                                {{ __('messages.web_home.doctors') }}
                            </h1>
                            <?php
                            $userName = request()->segment(2);
                            ?>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-lg-start justify-content-center mb-lg-0 mb-5">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('front',$userName) }}">{{ __('messages.web_home.home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ __('messages.web_home.doctors') }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-6 text-lg-end text-center">
                        <img src="{{ asset('web_front/images/page-banner/doctors.png') }}" alt="Infy Care" class="img-fluid" loading="lazy" />
                    </div>
                </div>
            </div>
        </section>
        <!-- end hero section -->

        <!-- start professional-doctors section -->
        <section class="professional-doctors-section position-relative p-t-120 p-b-120">
            <div class="container">
                <div class="col-lg-6 text-center mx-auto">
                    <h6 class="text-primary mb-3">{{ __('messages.web_home.professional_doctors') }}</h6>
                    <h2 class="mb-5 pb-xl-3">{{ __('messages.web_home.we_are_experienced_healthcare_professionals') }}</h2>
                </div>
                <div class="row justify-content-center">
                    @foreach($doctors as $doctor)
                        <div class="col-xxl-3 col-lg-4 col-md-6 text-center doctors-block my-lg-1">
                            <div class="px-lg-2 py-3">
                                <a href="{{ route('doctor.details',[$userName,$doctor->id]) }}">
                                    <img src="{{ $doctor->user->image_url }}" alt="Doctor" class="mx-auto card-image" loading="lazy">
                                    <div class="card text-center p-3">
                                        <h4>{{ \Illuminate\Support\Str::limit($doctor->user->full_name, 23) }}</h4>
                                        <p class="mb-2">
                                            ({{ \Illuminate\Support\Str::limit($doctor->user->qualification, 25) }})
                                        </p>
                                        <h5 class="text-success mb-0 fs-6 fw-normal">
                                            {{ \Illuminate\Support\Str::limit($doctor->specialist, 15) }}
                                            {{ __('messages.doctor.specialist') }}
                                        </h5>
                                        {{-- <h5 class="text-success mb-0 fs-6 fw-normal">
                                            {{ $doctor->patients_count }}{{ $doctor->patients_count > 0 ? '+' : ''}} Patients
                                        </h5> --}}
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation example">
                    {{ $doctors->links() }}
                </nav>
            </div>
        </section>
    </div>

@endsection
