<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/backend/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/content.css') }}">
</head>

<body>

    <div class="sidebar">
        <ul>
            <img src="{{ asset('images/logo/dj_logo_fit.png') }}" alt="Logo" height="100px">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>  
             <li><a href="{{ route('hero-images.index') }}">Hero Image</a></li> 
             <li><a href="{{ route('industry-partners.index') }}">Industry Partner</a></li>                
            <li><a href="{{ route('study_abroad') }}">Study Abroad</a></li>
            <li><a href="{{ route('backend_blog') }}">Blogs</a></li>
            <li><a href="{{ route('testimonials') }}">Testimonials</a></li>
            {{-- <li><a href="#">Events</a></li> --}}
            <li><a href="{{ route('backend_contact_us') }}">Contact Us</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </div>

    <div class="main-content">      
        {{-- <header>
            <h3>{{ $message }}</h3>
        </header> --}}

        <section>
            @yield('content')
        </section>
    </div>

</body>

</html>