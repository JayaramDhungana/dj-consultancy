@extends('frontend.layout.frontend_layout')

@section('title', 'About-us')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/frontend/about.css') }}">@endsection
@section('main-content')
  @section('page_title', 'About Us')

@section('class_name','active')
  @include('components.section_image')
<section class="about-white-premium">
    <div class="container">
        <!-- Hero Intro -->
        <div class="about-hero">
            <h1>We Turn Nepali <span>Dreams</span> Into Global Reality</h1>
            <p>Nepal’s most trusted education consultancy | 15+ years | 8,000+ students placed | 98% visa success</p>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat">
                <h2 class="counter" data-target="8000">0</h2><span></span>
                <p>Students Placed</p>
            </div>
            <div class="stat">
                <h2 class="counter" data-target="98">0</h2><span></span>
                <p>Visa Success Rate</p>
            </div>
            <div class="stat">
                <h2 class="counter" data-target="350">0</h2><span></span>
                <p>Partner Universities</p>
            </div>
            <div class="stat">
                <h2 class="counter" data-target="15">0</h2><span></span>
                <p>Years of Trust</p>
            </div>
        </div>

        <!-- Mission & Vision -->
        <div class="mv-grid">
    <div class="card">
        <div class="icon-bg"><i class="fas fa-bullseye"></i></div>
        <h3>Our Mission</h3>
        <p>
            To provide honest, transparent, and result-oriented counseling services that empower Nepali students to
            confidently pursue international education opportunities. We aim to guide every student with
            personalized support, accurate information, and ethical practices so they can study abroad with
            clarity, confidence, and zero stress.
        </p>
    </div>

    <div class="card">
        <div class="icon-bg"><i class="fas fa-eye"></i></div>
        <h3>Our Vision</h3>
        <p>
            To be recognized globally as Nepal’s most trusted and leading education consultancy, known for
            exceptional student success, high visa approval rates, and long-term academic outcomes. We envision
            creating a future where every aspiring student has equal access to world-class education and global
            career opportunities.
        </p>
    </div>
</div>

        <!-- Why Choose Us -->
        <div class="why-section">
            <h2>Why Students Trust Us</h2>
            <div class="why-grid">
                <div class="why-item">
                    <i class="fas fa-handshake"></i>
                    <h4>100% Free Service</h4>
                    <p>No counseling fee, no hidden charges</p>
                </div>
                <div class="why-item">
                    <i class="fas fa-university"></i>
                    <h4>Official University Partners</h4>
                    <p>Direct agreements with 350+ top universities</p>
                </div>
                <div class="why-item">
                    <i class="fas fa-shield-alt"></i>
                    <h4>98% Visa Success</h4>
                    <p>Highest approval rate in Nepal</p>
                </div>
                <div class="why-item">
                    <i class="fas fa-clock"></i>
                    <h4>24/7 Support</h4>
                    <p>From application till you land abroad</p>
                </div>
            </div>
        </div>
    </div>
</section>
   <section class="content-section">
    <div class="left-section">
        <img src="{{asset('images/picture/whychooseus.png')}}" alt="Why Choose Us - Study Abroad Experts">
    </div>
    <div>
        <h2 class="content-title">Why Choose Us?</h2>
        <p class="content-paragraph">We are committed to transforming your study abroad dreams into reality with personalized guidance, expert knowledge, and unwavering support. Our proven track record has helped thousands of Nepalese students secure admissions and visas successfully.</p>
        <ul class="why-list">
            <li><i class="fas fa-check-circle"></i> Personalized One-on-One Counseling</li>
            <li><i class="fas fa-check-circle"></i> 99% Visa Success Rate</li>
            <li><i class="fas fa-check-circle"></i> 22+ Years of Global Experience</li>
            <li><i class="fas fa-check-circle"></i> Free Profile Evaluation & Course Selection</li>
            <li><i class="fas fa-check-circle"></i> Dedicated Case Manager for Every Student</li>
            <li><i class="fas fa-check-circle"></i> 24/7 Support Throughout Your Journey</li>
        </ul>
    </div>
</section>

<!-- OUR EXPERTISE -->
<section class="expertise-section">
    <h2>Our Expertise</h2>
    <div class="card-container">
        <div class="expertise-card">
            <i class="fas fa-user-graduate expertise-icon"></i>
            <h3>Career Counseling</h3>
            <p>We help you select the best study program and destination based on your skills, goals, and budget.</p>
        </div>
        <div class="expertise-card">
            <i class="fas fa-passport expertise-icon"></i>
            <h3>Visa Guidance</h3>
            <p>Expert visa processing with complete documentation support and high success rates.</p>
        </div>
        <div class="expertise-card">
            <i class="fas fa-book-open expertise-icon"></i>
            <h3>Test Preparation</h3>
            <p>Professional training for IELTS, PTE, TOEFL, Duolingo, and other required tests.</p>
        </div>
        <div class="expertise-card">
            <i class="fas fa-file-alt expertise-icon"></i>
            <h3>Documentation Support</h3>
            <p>Full assistance with SOPs, LORs, financial documents, and university applications.</p>
        </div>
    </div>
</section>

<script>
    // Counter
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        const speed = 200;
        const updateCount = () => {
            const count = +counter.innerText;
            const inc = target / speed;
            if(count < target){
                counter.innerText = Math.ceil(count + inc);
                setTimeout(updateCount, 15);
            } else {
                counter.innerText = target + (target === 98 ? '%' : '+');
            }
        };
        updateCount();
    });

    // Simple fade-in on scroll (optional)
    const faders = document.querySelectorAll('.glass-card, .feature, .trust-section');
    const appearOptions = { threshold: 0.3 };
    const appearOnScroll = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if(entry.isIntersecting) entry.target.style.opacity = '1'; entry.target.style.transform = 'translateY(0)';
        });
    }, appearOptions);
    faders.forEach(f => { f.style.opacity = '0'; f.style.transform = 'translateY(40px)'; f.style.transition = 'all 1s'; appearOnScroll.observe(f); });
</script>

@endsection