@extends('backend.layouts.backend_layout')
@section('title', 'Blog  Management')
@section('content')
    <style>
       */
    </style>

    <div class="page-wrapper">

        <div class="header-bar">
            <h2>Blog Management</h2>
            <a href="{{ route('blog_create') }}" class="btn-add">+ Add New</a>
        </div>



        {{-- Stored Data Table --}}
        <h3>All Entries</h3>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Created At </th>
                    <th class="col-actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogEntries as $entry)
                    <tr>
                        <td>{!! $entry->title !!}</td>
                        <td>{!!   $entry->created_at !!}</td>
                        <td class="col-actions">
                            <div class="action-btns">
                                <a href="{{ route('blog_edit', $entry->id) }}" class="btn-edit">
                                    Edit
                                </a>

                                <form action="{{ route('blog.delete', $entry->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>



                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No entries found.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
                 {{-- Pagination Links --}}
    <div class="pagination-wrapper">
        {{ $blogEntries->links() }}
    </div>

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