@extends('backend.layouts.backend_layout')
@section('title', 'Testinomials  Management')
@section('content')


    <div class="page-wrapper">

        <div class="header-bar">
            <h2>Testimonials Management</h2>
            <a href="{{ route('testinomials_create') }}" class="btn-add">+ Add New</a>
        </div>

        {{-- Stored Titles --}}
        <h3>Titles</h3>
        <table>
            <thead>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @forelse($testinomialsTitles as $title)
                    <tr>
                        <td>{{ $title->title }}</td>
                        <td>{{ $title->subtitle }}</td>
                        <td class="col-actions">
                            <div class="action-btns">
                                <a href="{{ route('testinomials_title_edit', 1) }}" class="btn-edit">
                                    Edit
                                </a>
                            </div>
                        </td>  
                    </tr>
                @empty  
                    <tr>
                        <td colspan="3">No titles found.</td>
                    </tr>
                @endforelse
            </tbody>
             

        </table>




        {{-- Stored Data Table --}}
        <h3>All Entries</h3>
        <table>
            <thead>
                <tr>
                    <th>Student's Name</th>
                    <th>Created At </th>
                    <th class="col-actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testinomialsEntries as $entry)
                    <tr>
                        <td>{!! $entry->student_name !!}</td>
                        <td>{!!   $entry->created_at !!}</td>
                        <td class="col-actions">
                            <div class="action-btns">
                                <a href="{{ route('testinomials_edit', $entry->id) }}" class="btn-edit">
                                    Edit
                                </a>

                                <form action="{{ route('testinomials.delete', $entry->id) }}" method="POST"
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
        {{ $testinomialsEntries->links() }}
    </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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