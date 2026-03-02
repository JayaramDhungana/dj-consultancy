@extends('backend.layouts.backend_layout')
@section('title', 'Hero Image  Management')
@section('content')
    <style>
       */
    </style>

    <div class="page-wrapper">
        {{-- Hami sanga yeuta matra image huni bhayera hamilai ahile yo add new pani chiaidaina,pachhi hamile chaiyo bhane rakhna pani sakchhau --}}
        {{-- <div class="header-bar">
            <h2>Hero Image Management</h2>
            <a href="{{ route('hero-images.create') }}" class="btn-add">+ Add New</a>
        </div> --}}

        {{-- Stored Data Table --}}
        <h3>All Entries</h3>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Created At </th>
                    <th class="col-actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($heroImages)
                    <tr>
                      <td><img src="{{ asset($heroImages->image) }}" alt="Hero Image" class="hero-thumb"></td>
                        <td>{{ $heroImages->created_at }}</td>
                        <td class="col-actions">
                            <div class="action-btns">
                                <a href="{{ route('hero-images.edit', $heroImages->id) }}" class="btn-edit">
                                    Edit
                                </a>

                                {{-- We don't need delete for now --}}

                                {{-- <form action="{{ route('hero-images.destroy', $heroImages->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">
                                        Delete
                                    </button>
                                </form> --}}
                            </div>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="5">No entries found.</td>
                    </tr>
                @endif
            </tbody>

        </table>
    {{-- Pagination Links --}}
    {{-- <div class="pagination-wrapper">
        {{ $blogEntries->links() }}
    </div> --}}

    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        ClassicEditor.create(document.querySelector('#text1'));
        ClassicEditor.create(document.querySelector('#text2'));
    </script>
     @if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: @json(session('success')),
            timer: 3000,
            showConfirmButton: false
        });
    });
</script>
@endif
@endsection