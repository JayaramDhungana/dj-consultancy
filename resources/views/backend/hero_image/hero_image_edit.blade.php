@extends('backend.layouts.backend_layout')
@section('title', 'Hero Image  Management')

@section('content')
   

    <div class="page-wrapper">

        <div class="header-bar">
            <h2>Hero Image Management</h2>
        </div>

        {{-- Add Form --}}
        <div id="addForm" class="form-section">
            <form method="POST" action="{{ route('hero-images.update',$heroImage->id),}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
               <label>Image</label>
                <img id="previewImage1" src="{{ asset($heroImage->image) }}" width="120"
                    style="margin-bottom:10px;">
                    <br>
                <input type="file" name="image" onchange="previewImage(this,'previewImage1')">

                <br>

                <button type="submit">Save</button>
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
        ClassicEditor.create(document.querySelector('#title'));
        ClassicEditor.create(document.querySelector('#details'));

        function previewImage(input, previewId) {
            const file = input.files[0];
            const preview = document.getElementById(previewId);

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection