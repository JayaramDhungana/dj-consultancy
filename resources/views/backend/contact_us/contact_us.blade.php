@extends('backend.layouts.backend_layout')
@section('title', 'Blog  Management')
@section('content')
     <style>
    
    </style>

    <div class="page-wrapper">
        {{-- Stored Data Table --}}
        <h1>Contact Us</h1>
        <h3>All Entries</h3>
        <table>
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                     <th>Preffered Study Destination</th>
                    <th>Prefered Study Year</th>
                    <th>Prefered Study Intake</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contactUsEntries as $entry)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $entry->name }}</td>
                        <td>{{ $entry->email }}</td>
                        <td>{{ $entry->address }}</td>
                        <td>{{ $entry->mobile_number }}</td>
                        <td>{{ $entry->study_destination }}</td>
                        <td>{{ $entry->study_year }}</td>
                        <td>{{ $entry->study_intake }}</td>
                        <td class="col-actions">
                            <div class="action-btns">
                                <form action="{{ route('contact_us_delete', $entry->id) }}" method="POST"
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
                     {{-- Pagination Links --}}
    
        </table>
        <div class="pagination-wrapper">
        {{ $contactUsEntries->links() }}
    </div>
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
    </div>
@endsection