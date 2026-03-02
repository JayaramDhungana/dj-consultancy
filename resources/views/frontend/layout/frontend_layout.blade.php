<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')-DJ</title>
  <link rel="icon" href="{{ asset('images/logo/dj_logo_fit-removebg-preview.png') }}" type="image/png">
  <link rel="stylesheet" href="{{ asset('css/frontend/layout.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  @yield('styles')

</head>

<body>
  <header>
    <div class="navbar-container">
      <!-- Logo -->
      <div class="logo">
        <a href="{{ route('home') }}">
          <img src="{{ asset('images/logo/dj_logo_fit-removebg-preview.png') }}" alt="Logo">
        </a>
      </div>

      <!-- Desktop Menu -->
      <nav class="nav-menu">
        <ul class="menu-list">
          <li><a href="{{ route('home') }}" class="menu-link {{ request()->routeIs('home') ? 'active' : '' }}">HOME</a>
          </li>
          <li><a href="{{ route('about') }}" class="menu-link {{ request()->routeIs('about') ? 'active' : '' }}">ABOUT
              US</a></li>

          <li class="dropdown">
            <a href="#" class="menu-link {{ request()->routeIs('study_abroad.show') ? 'active' : '' }}">STUDY ABROAD <i
                class="fas fa-chevron-down"></i></a>
            <ul class="dropdown-menu">
              @isset($studyAbroadEntries)
                @foreach($studyAbroadEntries as $entry)
                  <li><a href="{{ route('study_abroad.show', $entry->id) }}">{{ $entry->title }}</a></li>
                @endforeach
              @endisset
            </ul>
          </li>
          <li><a href="{{ route('blog.show') }}"
              class="menu-link {{ request()->routeIs('blog.show') ? 'active' : '' }}">BLOG</a></li>
          {{-- <li><a href="#" class="menu-link">EVENTS</a></li> --}}
          <li><a href="{{ route('contact_us') }}" class="menu-link highlight">CONTACT US</a></li>
        </ul>
      </nav>

      <!-- Mobile Toggle -->
      <details class="bars">
        <summary class="barssummary">☰ </summary>
        <ul>
          <li><a href="{{ route('home') }}" class="menu-link {{ request()->routeIs('home') ? 'active' : '' }}">HOME</a>
          </li>
          <li><a href="{{ route('about') }}" class="menu-link {{ request()->routeIs('about') ? 'active' : '' }}">ABOUT
              US</a></li>

          <li class="dropdown">
            <details>
              <summary>STUDY ABROAD <i class="fas fa-chevron-down"></i></summary>
              <ul class="dropdown-menu">
                @isset($studyAbroadEntries)
                  @foreach($studyAbroadEntries as $entry)
                    <li><a href="{{ route('study_abroad.show', $entry->id) }}"
                        class="dropdown-singleitem">{{ $entry->title }}</a></li>
                  @endforeach
                @endisset
              </ul>
            </details>
          </li>
          <li><a href="{{ route('blog.show') }}"
              class="menu-link {{ request()->routeIs('blog.show') ? 'active' : '' }}">BLOG</a></li>
          <li><a href="#" class="menu-link">EVENTS</a></li>
          <li><a href="{{ route('contact_us') }}" class="menu-link highlight">CONTACT US</a></li>
        </ul>
      </details>
    </div>

    <!-- Mobile Bars Menu -->
  </header>


  @yield('main-content')
  <footer class="footer">

    <!-- LEFT SIDE (UNCHANGED) -->
    <div class="footer-left">

      <div class="footer-about">
        <img src="{{ asset('images/logo/dj_logo_fit-removebg-preview.png') }}" alt="DJ Consultancy Logo">
        <p>
          DJ consultancy pvt ltd, where our team of experienced
          educators and professionals are dedicated to helping students reach
          their full potential.
        </p>
      </div>

      <div class="footer-links">

        <div class="footer-box">
          <h3>Support</h3>
          <ul>
            <li><a href="#">IELTS</a></li>
            <li><a href="#">FAQs</a></li>
          </ul>
        </div>

        <div class="footer-box">
          <h3>Blogs</h3>
          <ul>
            @foreach ($blogEntries as $entry)
              <li><a href="{{ route('blog.details', $entry->id) }}">
                  {{ trim(html_entity_decode(strip_tags($entry->title))) }}
                </a></li>
            @endforeach
            {{-- <li><a href="#">Who We Are</a></li>
            <li><a href="#">Our Approach</a></li>
            <li><a href="#">B2B Partners</a></li> --}}
          </ul>
        </div>

        <div class="footer-box">
          <h3>Privacy</h3>
          <ul>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms and Conditions</a></li>
          </ul>
        </div>

      </div>
    </div>

    <!-- RIGHT SIDE (UNCHANGED) -->
    <div class="footer-right">
      <div class="contact-info">

        <p>
          <i class="fas fa-phone-alt"></i>
          <strong>Call Us:</strong><br>
          +977-9840031531
        </p>

        <p>
          <i class="fas fa-envelope"></i>
          <strong>Email Us:</strong><br>
          info@djconsultancy.com.np
        </p>

      </div>

      <div class="newsletter">
        <h3>
          Newsletter
        </h3>

        <p>
          Subscribe to Our Newsletter to get Important News,
          Amazing Offers & Inside Scoops:
        </p>

        <form>
          <input type="email" placeholder="Type Your Email">
          <button type="submit">Subscribe</button>
        </form>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="footer-line"></div>

      <p class="copyright">
        © Copyright 2025 djconsultancy (P) Ltd. All Rights Reserved
      </p>

      <p class="designer">
       Designed & Developed by Jayaram Dhungana
      </p>
    </div>

  </footer>
  <script>
    document.querySelector('.mobile-toggle').addEventListener('click', function () {
      document.querySelector('.mobile-menu').classList.toggle('active');
      this.classList.toggle('active');
    });

    // Scrolled effect
    window.addEventListener('scroll', () => {
      document.querySelector('.main-header').classList.toggle('scrolled', window.scrollY > 50);
    });



    document.addEventListener("DOMContentLoaded", function () {
      // Only target mobile screens
      if (window.innerWidth <= 1024) {
        const dropdowns = document.querySelectorAll('.nav-menu .dropdown > a');

        dropdowns.forEach(drop => {
          drop.addEventListener('click', function (e) {
            e.preventDefault(); // prevent link
            const parent = this.parentElement;
            parent.classList.toggle('open');
          });
        });
      }
    });

  </script>
</body>

</html>