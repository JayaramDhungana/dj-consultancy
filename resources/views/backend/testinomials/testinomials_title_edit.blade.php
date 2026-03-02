@extends('backend.layouts.backend_layout')
@section('title', 'Study Abroad Management')

@section('content')
    

    <div class="page-wrapper">

        <div class="header-bar">
            <h2>Testinomials Title Management</h2>
        </div>

        {{-- Add Form --}}
        <div id="addForm" class="form-section">
             <form method="POST" action="{{ route('testinomials_title.update',1) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <label>Title</label>
                <input type="text" name="title" id="title" placeholder="Title" value="{{ $testinomialsTitles->title}}">
                <label>Subtitle</label>
                <input type="text" name="subtitle" id="subtitle" placeholder="Subtitle" value="{{ $testinomialsTitles->subtitle }}">
                <br>
                <button type="submit">Update</button>
            </form>
        </div>

        @if($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script>
        // ClassicEditor.create(document.querySelector('#title'));
        // ClassicEditor.create(document.querySelector('#details'));

        
    </script>
@endsection