@extends('backend.layouts.backend_layout')
@section('title', 'Study Abroad Management')

@section('content')


    <div class="page-wrapper">

        <div class="header-bar">
            <h2>Study Abroad Management</h2>
            <a href="{{ route('study_abroad_create') }}" class="btn-add">+ Add New</a>
        </div>
        
        {{-- Stored Data Table --}}
        <h3>All Entries</h3>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Text 1</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($studyAbroadEntries as $entry)
                    <tr>
                        <td>{{ $entry->title }}</td>
                        <td>{!! $entry->text1 !!}</td>
                         <td>{{ $entry->created_at }}</td>
                        <td class="col-actions">
                            <div class="action-btns">
                                <a href="{{ route('study_abroad_edit', $entry->id) }}" class="btn-edit">
                                    Edit
                                </a>
                                <form action="{{ route('study_abroad.delete', $entry->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');" style="display:inline-block;">
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
        {{ $studyAbroadEntries->links() }}
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