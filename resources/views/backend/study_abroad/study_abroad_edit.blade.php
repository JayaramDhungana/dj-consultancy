@extends('backend.layouts.backend_layout')
@section('title', 'Study Abroad Management')

@section('content')
    

    <div class="page-wrapper">

        <div class="header-bar">
            <h2>Study Abroad Management</h2>
        </div>

        {{-- Add Form --}}
        <div id="addForm" class="form-section">
            <h3>Edit Study Abroad Entry</h3>
            <form method="POST" action="{{ route('study_abroad.update', $studyAbroadEntry->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label>Title</label>
                <input type="text" name="title" value="{{ $studyAbroadEntry->title }}" required>

                <label>Header Image</label>
                <img id="previewHeader" src="{{ asset('storage/' . $studyAbroadEntry->header_image) }}" width="120"
                    style="margin-bottom:10px;"><br>

                <input type="file" name="header_image" onchange="previewImage(this,'previewHeader')">

                <label>Image 1</label>
                <img id="previewImg1" src="{{ asset('storage/' . $studyAbroadEntry->img1) }}" width="120"
                    style="margin-bottom:10px;">
                    <br>

                <input type="file" name="img1" onchange="previewImage(this,'previewImg1')">

                <label>Image 2</label>
                <img id="previewImg2" src="{{ asset('storage/' . $studyAbroadEntry->img2) }}" width="120"
                    style="margin-bottom:10px;">
                    <br>

                <input type="file" name="img2" onchange="previewImage(this,'previewImg2')">

                <label>Text 1</label>
                <textarea name="text1" id="text1">{{ $studyAbroadEntry->text1 }}</textarea>

                        <br>
                <label>Text 2</label>
                <textarea name="text2" id="text2">{{ $studyAbroadEntry->text2 }}</textarea>

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
        ClassicEditor.create(document.querySelector('#text1'));
        ClassicEditor.create(document.querySelector('#text2'));

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