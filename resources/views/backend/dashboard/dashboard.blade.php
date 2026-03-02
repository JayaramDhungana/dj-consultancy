@extends('backend.layouts.backend_layout')

@section('title', 'Dashboard')

@section('content')


 <h1>Hello Admin </h1>
<div class="cards">
    <div class="card">
        <h4>Total Countries Added</h4>
        <p>{{ $totalCountries  }}</p>
    </div>

    <div class="card">
        <h4>Total Blogs</h4>
        <p>{{ $totalBlogs }}</p>
    </div>
    <div class="card">
        <h4>Total Registed Students</h4>
        <p>{{ $totalContacts }}</p>
    </div>

 
</div>



@endsection
