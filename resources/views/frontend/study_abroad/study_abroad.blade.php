@extends('frontend.layout.frontend_layout')
@section('title', 'Study Abroad in ' . $entry->title)
@section('class_name', 'active')
@section('main-content')

    @section('styles')
        <link rel="stylesheet" href="{{ asset('css/frontend/study_abroad.css') }}">
    @endsection

    <!-- Hero Section -->
    <section class="premium-hero" style="
        height: 30vh;
        /* min-height: 700px; */
        background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.6)),
                    url('{{ $entry->header_image ? asset("storage/" . $entry->header_image) : "https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1920" }}') center/cover no-repeat;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
     ">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">
                Study in <span class="gradient-text">{{ $entry->title }}</span>
            </h1>

        </div>
    </section>

    <!-- Main Content -->
    <div class="ielts-content">

        <!-- Section 1: Text Left -->
        <div class="alt-section text-left" data-aos="fade-right">
            <div class="text-content">
                <h2 class="section-title">{!! $entry->text1 !!}</h2>
            </div>
            @if($entry->img1)
                <div class="image-content" data-aos="fade-left" data-aos-delay="200">
                    <img src="{{ asset('storage/' . $entry->img1) }}" alt="{{ $entry->title }} Campus">
                </div>
            @endif
        </div>
         <br>
        <!-- Section 2: Image Left -->
        <div class="alt-section text-right" data-aos="fade-left">
            @if($entry->img2)
                <div class="image-content" data-aos="fade-right" data-aos-delay="200">
                    <img src="{{ asset('storage/' . $entry->img2) }}" alt="{{ $entry->title }} Lifestyle">
                </div>
            @endif
            <div class="text-content">
                <h2 class="section-title">{!! $entry->text2 !!}</h2>
            </div>
        </div>

    </div>

    @include('components.register_form')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script>
        AOS.init({
            once: true,
            duration: 1000,
            easing: 'ease-out-cubic'
        });
    </script>
@endsection