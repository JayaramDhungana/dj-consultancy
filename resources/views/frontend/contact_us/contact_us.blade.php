@extends('frontend.layout.frontend_layout')
@section('class_name', 'active')
@section('title', 'Contact_us')
@section('main-content')
  @section('page_title', 'Contact Us')

  <style>


    .form-section {
      width: 98%;
      padding: 60px 8%;
      display: flex;
      justify-content: space-between;
      gap: 40px;
      background: #faf8ff;
    }

    .form-left {
      width: 50%;
    }

    .form-left iframe {
      width: 90%;
      height: 70vh;
      border-radius: 14px;
    }

    .form-right {
      width: 50%;
    }

    .form-title {
      font-size: 22px;
      font-weight: 600;
      color: #2d1653;
      margin-bottom: 20px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 18px;
    }

    input,
    select {
      width: 100%;
      padding: 14px 18px;
      border-radius: 8px;
      border: 1px solid #ddd;
      font-size: 15px;
      outline: none;
    }

    input:focus,
    select:focus {
      border-color: #5d33b8;
    }

    .phone-field {
      display: flex;
      gap: 10px;
    }

    .country-code {
      background: #f3efff;
      padding: 14px 18px;
      border-radius: 8px;
      border: 1px solid #ddd;
      font-size: 15px;
    }

    .agree {
      display: flex;
      align-items: end;
      gap: 10px;
    }

    .agree input {
      width: 16px;
      height: 16px;
      cursor: pointer;
    }

    .agree label {
      color: #555;
      font-size: 12px;
      line-height: 1.4;
    }

    .agree label a {
      color: #2d1653;
      text-decoration: none;
    }

    .submit-btn {
      background: #2d1653;
      color: #fff;
      padding: 16px;
      border: none;
      border-radius: 30px;
      font-size: 16px;
      width: 50%;
      margin: auto;
      cursor: pointer;
    }

    .submit-btn:hover {
      background: #3e1f6d;
      transition: 0.3s;
    }
  </style>

  @include('components.section_image')

  <section class="form-section">
    <div class="form-left">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3532.58!2d85.2814469!3d27.7157932!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1733920000000"></iframe>
    </div>
    <div class="form-right">
      <h3 class="form-title">Turn your Study Abroad Dream to Degrees abroad</h3>

      <form method="POST" action="{{ route('store_contact_us') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="Name" name="name" required>
        <input type="email" placeholder="Email" name="email" required>
        <input type="address" placeholder="Address" name="address" required>

        <div class="phone-field">
          <span class="country-code">+977</span>
          <input type="number" placeholder="Mobile Number" name="mobile_number" required>
        </div>


        <select name="study_destination">
          <option selected disabled>Preferred Study Destination</option>
          @foreach ($studyAbroadEntries as $entry)
            <option>{{ $entry->title }}</option>
          @endforeach
        </select>

        <select name="study_year">
          <option selected disabled>Preferred Study Year</option>
          <option>2025</option>
          <option>2026</option>
        </select>

        <select name="study_intake">
          <option selected disabled>Preferred Study Intake</option>
          <option>Q1(Jan-Mar)</option>
          <option>Q2(Apr-Jun)</option>
          <option>Q3(Jul-Sep)</option>
          <option>Q4(Oct-Dec)</option>
        </select>
        <div class="agree">
          <input type="checkbox" class="agree" name="agree" required>
          <label for="agree">By clicking you agree to our <a href="#">Privacy Policy</a> and <a href="#">Terms &
              Conditions</a></label>
        </div>
        <button class="submit-btn">Get Started for Free</button>
      </form>
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

  </section>


@endsection