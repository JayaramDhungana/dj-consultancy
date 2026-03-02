@extends('frontend.layout.frontend_layout')

@section('title', 'Home')
@section('class_name', 'active')

@section('main-content')
  <section class="hero">
    <div class="hero-content">
      <h1>Nepal's leading study abroad consultants</h1>
      <p>We've assisted over 760,000 students in their study abroad journey.</p>
      <div class="country-buttons">
        @foreach ($studyAbroadEntries as $entry)
          <a href="{{ route('study_abroad.show', $entry->id) }}" class="btn">{{ $entry->title }}<i
              class="fa-solid fa-circle-right"></i></a>
        @endforeach
      </div>
    </div>
    <div class="pic">
      <img src="{{ asset($heroImages->image) }}" alt="images" width="100%">
    </div>

  </section>

  <section class="study-abroad-section">
    <div class="container">
      <div class="section-header">
        <h1>Wherever you want to go,<br><span>we'll get you there.</span></h1>
        <p>Explore the best study destinations in the world! Top universities, scholarships, living costs, post-study work
          visa & more.</p>
      </div>

      <div class="countries-grid">

        @foreach ($studyAbroadEntries as $entry)
          <a href="{{ route('study_abroad.show', $entry->id) }}" class="country-link">
            <div class="country-card">
              <div class="card-inner">
                <img src="{{ asset('storage/' . $entry->header_image) }}" alt="Study in {{ $entry->title }}">
                <div class="card-overlay">
                  <h3>Study in {{ $entry->title }}</h3>
                  <a href="{{ route('study_abroad.show', $entry->id) }}" class="learn-more">Learn More →</a>
                </div>
              </div>

            </div>
            </a>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="services-section">
    <h2>Our Services</h2>
    <div class="services-grid">
      <div class="service-card">
        <i class="fas fa-briefcase"></i> <!-- Use Font Awesome or similar for icons -->
        <h3>Business Consulting</h3>
        <p>Strategic planning and market analysis tailored for Nepali businesses.</p>
      </div>
      <div class="service-card">
        <i class="fas fa-graduation-cap"></i>
        <h3>Education Consultancy</h3>
        <p>Guidance for studying abroad and local opportunities in Nepal.</p>
      </div>
      <div class="service-card">
        <i class="fas fa-chart-line"></i>
        <h3>Financial Advisory</h3>
        <p>Expert financial planning and investment strategies.</p>
      </div>
      <div class="service-card">
        <i class="fas fa-globe"></i>
        <h3>Immigration Services</h3>
        <p>Visa and relocation support for Nepali citizens.</p>
      </div>
    </div>
  </section>

  <section class="testimonials">
    <h2>{{ $testinomialsTitles->title }}</h2>
    <p class="subtitle">
       {{ $testinomialsTitles->subtitle }}
    </p>

    <div class="testi-container">
      @foreach ($testinomialsEntries as $entry )
        <div class="testi-card">
        <span class="quote">❝</span>
        <p>{{ $entry->testimonials_message }}</p>
        <div class="pin-section">
          <img class="pin" src="https://www.aeccglobal.com.np/images/2023/08/18/aecc-pin.png" alt="pin">
          <div class="user-info">
            <h4>{{ $entry->student_name}}</h4>
            <small>{{ $entry->student_country}}</small>
          </div>
        </div>
      </div>
      @endforeach
      

    </div>
  </section>

  <div class="paternship-section">
      <div class="mission-content paternship-topic">
        <h1>Our industry partnerships</h1>
      <p>Our affiliations with industry leaders, accreditations, and partnerships speak volumes about our credibility and
        standing.</p>
         <img src="{{ asset('images/picture/pic-12.webp') }}" alt="paternship-oragnization " width="100%">
    </div>
   
  </div>
  {{-- <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide"> <img src="{{ asset('images/picture/pic-12.webp') }}" alt="paternship-oragnization " width="100%"></div>
    </div>
    <div class="swiper-pagination"></div>
  </div> --}}

   <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: "auto",
      centeredSlides: true,
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>

@endsection