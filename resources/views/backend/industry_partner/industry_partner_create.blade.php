@extends('backend.layouts.backend_layout')
@section('title', 'Industry Partner Management')

@section('content')


    <div class="page-wrapper">

        <div class="header-bar">
            <h2>Industry Partner Management</h2>
            {{-- <a href="#addForm" class="btn-add">+ Add New</a> --}}
        </div>

        {{-- Add Form --}}
        <div id="addForm" class="form-section">
            <h3>Add New Industry Partner Entry</h3>
            <form method="POST" action="{{ route('industry-partners.store') }}" enctype="multipart/form-data">
                @csrf

                <label>Industry Partner Image</label>
                <img id="previewHeader" src="" width="120" style="margin-bottom:10px; display:none;">
                <input type="file" name="image" required onchange="previewImage(this,'previewHeader')">

                <label>Name</label>
                <input type="text" name="name" id="title">

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

    <script>

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