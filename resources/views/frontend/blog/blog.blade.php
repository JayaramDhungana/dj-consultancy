@extends('frontend.layout.frontend_layout')
@section('class_name', 'active')
@section('title', 'blogs')
  @section('page_title', 'Blogs')
@section('main-content')

    <style>
        .blogs {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 100px;
            padding: 40px 0;
        }

        .blog-card {
            width: 350px;
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        .blog-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .blog-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* 🔥 main fix */
            display: block;
        }


        .blog-content {
            padding: 20px;
        }

        .blog-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        .blog-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #111;
        }

        .blog-desc {
            font-size: 15px;
            color: #555;
            line-height: 1.6;

            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .read-more-btn {
            display: inline-block;
            padding: 10px 20px;
            background: #0b1c2d;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            /* transition: background 0.3s ease; */
        }

        .read-more-btn:hover {
            background: #132f4c;
        }
    </style>
      @include('components.section_image')

    <div class="blogs">

        @foreach ($blogEntries as $entry)
            <div class="blog-card">
                <div class="blog-image">
                    <img src="{{ asset('storage/' . $entry->image) }}" alt="Image">
                </div>


                <div class="blog-content">
                    <div class="blog-meta">
                        <span>📘 Blog</span>
                        <span>{{ $entry->created_at }}</span>
                    </div>

                    <div class="blog-title">
                        {!!  $entry->title !!}
                    </div>

                    <div class="blog-desc">
                        {!! $entry->details !!}
                    </div>
                    <br>

                    <a href="{{ route('blog.details', $entry->id) }}" class="read-more-btn">
                        Read More
                    </a>
                </div>
            </div>



        @endforeach


    </div>

@endsection