@extends('backend.layouts.backend_layout')
@section('title', 'Testinomials  Management')

@section('content')
   

    <div class="page-wrapper">

        <div class="header-bar">
            <h2>Blog Management</h2>
        </div>

        {{-- Add Form --}}
        <div id="addForm" class="form-section">
             <form method="POST" action="{{ route('testinomials.update',$testinomialsEntry->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <label>Title</label>
                <input type="text" name="student_name" id="student_name" placeholder="Student's Name" value="{{ $testinomialsEntry->student_name }}">
                <label>Student's Country</label>
                <input type="text" name="student_country" id="student_country" placeholder="Student's Country" value="{{ $testinomialsEntry->student_country }}">
                <label>Student's Name</label>
                <textarea type="text" name="testimonials_message" id="testinomials_message" placeholder="testinomilas Message">
                    {{ $testinomialsEntry->testimonials_message }}
                </textarea>
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