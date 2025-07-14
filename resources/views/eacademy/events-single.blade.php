@extends('layouts.master')
@section('title', 'events-single')
@section( 'content')

@section('css')
<style>
    .events-left img {
    margin-top: 35px;
    border-radius: 5px;
    width: 100%;
    height: 300px;
}
</style>
@endsection

    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{ asset('backend/images/page-banner-3.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>{{ $event->title }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('eacademy.events') }}">Events</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $event->title }}</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== EVENTS PART START ======-->

    <section id="event-singel" class="pt-120 pb-120 gray-bg">
        <div class="container">
            <div class="events-area">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="events-left">
                            <h3>{{ $event->title }}</h3>
                            <span><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($event->duration)->format('d F Y') }}</span>
                            <span><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($event->time_start)->format('h:i A') }} - {{ \Carbon\Carbon::parse($event->time_end)->format('h:i A') }}</span>
                            <span><i class="fa fa-map-marker"></i> {{ $event->location }}</span>
                            <img src="{{ asset('uploads/' . $event->image) }}" alt="Event">
                            <p>{{ $event->content }}</p>
                        </div> <!-- events left -->
                    </div>
                    <div class="col-lg-4">
                        <div class="events-right">
                            <div class="events-coundwon bg_cover" data-overlay="8" style="background-image: url({{ asset('backend/images/event/singel-event/coundown.jpg') }})">
                                <div data-countdown="2020/03/12"></div>
                                <div class="events-coundwon-btn pt-30">
                                    <a href="#" class="main-btn">Book Your Seat</a>
                                </div>
                            </div> <!-- events coundwon -->
                            <div class="events-address mt-30">
                                <ul>
                                    <li>
                                        <div class="singel-address">
                                            <div class="icon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <div class="cont">
                                                <h6>Start Time</h6>
                                                <span>{{ \Carbon\Carbon::parse($event->time_start)->format('h:i A') }}</span>
                                            </div>
                                        </div> <!-- singel address -->
                                    </li>
                                    <li>
                                        <div class="singel-address">
                                            <div class="icon">
                                                <i class="fa fa-bell-slash"></i>
                                            </div>
                                            <div class="cont">
                                                <h6>Finish Time</h6>
                                                <span>{{ \Carbon\Carbon::parse($event->time_end)->format('h:i A') }}</span>
                                            </div>
                                        </div> <!-- singel address -->
                                    </li>
                                    <li>
                                        <div class="singel-address">
                                            <div class="icon">
                                                <i class="fa fa-map"></i>
                                            </div>
                                            <div class="cont">
                                                <h6>Address</h6>
                                                <span>{{ $event->location }}</span>
                                            </div>
                                        </div> <!-- singel address -->
                                    </li>
                                </ul>
                                <div id="contact-map" class="mt-25"></div> <!-- Map -->
                            </div> <!-- events address -->
                        </div> <!-- events right -->
                    </div>
                </div> <!-- row -->
            </div> <!-- events-area -->
        </div> <!-- container -->
    </section>

    <!--====== EVENTS PART ENDS ======-->



@endsection
