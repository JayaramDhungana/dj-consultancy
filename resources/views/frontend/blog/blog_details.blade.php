@extends('frontend.layout.frontend_layout')
@section('class_name','active')

@section('title', 'Bloats')
  @section('page_title', 'Blogs')

@section('main-content')

<style>
    .blog-details-wrapper {
        max-width: 900px;
        margin: 40px auto;
        padding: 0 20px;
        font-family: Arial, sans-serif;
    }

    .blog-cover {
        width: 100%;
        height: 400px;
        background: #eaeaea;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #777;
        font-size: 24px;
        font-weight: bold;
        border-radius: 8px;
        margin-bottom: 30px;
        overflow: hidden;
    }

    .blog-meta {
        display: flex;
        align-items: center;
        gap: 15px;
        color: #777;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .blog-title {
        font-size: 32px;
        font-weight: bold;
        color: #0b1c2d;
        margin-bottom: 25px;
        line-height: 1.3;
    }

    .blog-body {
        font-size: 16px;
        color: #555;
        line-height: 1.9;
    }

    .blog-body h2,
    .blog-body h3 {
        margin-top: 30px;
        margin-bottom: 15px;
        color: #333;
    }

    .blog-body ul {
        margin-left: 20px;
        margin-bottom: 20px;
    }

    .blog-body p {
        margin-bottom: 18px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .blog-cover {
            height: 250px;
        }

        .blog-title {
            font-size: 24px;
        }
    }
</style>

  {{-- @include('components.section_image') --}}

<div class="blog-details-wrapper">
    <!-- Blog Image -->
    <div class="blog-cover">

          <img src="{{ asset('storage/' . $entry->image) }}" alt="Image">
       
    </div>

    <!-- Meta -->
    <div class="blog-meta">
        <span>📅 {{ $entry->created_at }}</span>
        <span>📘 Blog</span>
    </div>

    <!-- Title -->
    <div class="blog-title">
         {!!  $entry->title !!}
    </div>

    <!-- Content -->
    <div class="blog-body">
        {!! $entry->details !!}
    </div>

</div>

@endsection
