<div class="register-now-section">
    
<div class="register-flat form-right">
    <h2 class="form-title">Turn your Study Abroad Dream to Degrees Abroad</h2>

    <form method="POST" action="{{ route('store_contact_us') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name & Email -->
        <div class="form-row">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Your email" required>
            </div>
        </div>

        <!-- Address & Mobile -->
        <div class="form-row">
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" placeholder="Your address" required>
            </div>

            <div class="form-group">
                <label for="mobile_number">Mobile Number</label>
                <div style="display:flex;">
                    <span class="country-code">+977</span>
                    <input type="number" name="mobile_number" id="mobile_number" placeholder="Mobile Number" required style="flex:1;">
                </div>
            </div>
        </div>

        <!-- Study Abroad Options -->
        <div class="form-row">
            <div class="form-group">
                <label for="study_destination">Preferred Study Destination</label>
                <select name="study_destination" id="study_destination" required>
                    <option selected disabled>Select Destination</option>
                    @foreach ($studyAbroadEntries as $entry)
                        <option value="{{ $entry->title }}">{{ $entry->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="study_year">Preferred Study Year</label>
                <select name="study_year" id="study_year" required>
                    <option selected disabled>Select Year</option>
                    <option>2025</option>
                    <option>2026</option>
                </select>
            </div>

            <div class="form-group">
                <label for="study_intake">Preferred Study Intake</label>
                <select name="study_intake" id="study_intake" required>
                    <option selected disabled>Select Intake</option>
                    <option>Q1 (Jan-Mar)</option>
                    <option>Q2 (Apr-Jun)</option>
                    <option>Q3 (Jul-Sep)</option>
                    <option>Q4 (Oct-Dec)</option>
                </select>
            </div>
        </div>

        <!-- Terms & Conditions -->
        <div class="form-group agree">
            <label class="checkbox-container">
                <input type="checkbox" name="agree" required>
                <span class="checkmark"></span>
                I agree to the <a href="#">Privacy Policy</a> and <a href="#">Terms & Conditions</a>
            </label>
        </div>

        <button type="submit" class="submit-btn">Get Started for Free</button>
    </form>
</div>
<img src="{{ asset("images/picture/register_now_picture.jpg") }}" alt="" class="form-image" width="100vw">
</div>

<!-- SweetAlert Success -->
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

<style>
    .register-now-section{
        display: flex;
        gap: 40px;
        margin: 0px 90px 80px 90px;
        justify-content: center
    }
    .form-image {
    width: 45%;
    border-radius: 14px;
    object-fit: cover;
}
.register-flat {
    max-width: 85%;
    /* margin: 40px auto; */
    padding: 30px;
    background: #f8f9fa;
    border-radius: 10px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    border: 1px solid #e0e0e0;
}

.register-flat h2.form-title {
    text-align: center;
    margin-bottom: 30px;
   color:  #282251
}

.form-row {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.form-group {
    flex: 1;
    min-width: 250px;
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: 600;
    margin-bottom: 6px;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    background: #fff;
    color: #333;
    box-sizing: border-box;
}

.country-code {
    display: inline-flex;
    align-items: center;
    padding: 0 12px;
    background: #eee;
    border-radius: 6px 0 0 6px;
    border: 1px solid #ccc;
}

button.submit-btn {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 8px;
    background-color: #282251
    color: #fff;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
    transition: 0.2s;
}

button.submit-btn:hover {
    background-color: #059e9c;
}
@media (max-width: 1024px) {
    .register-now-section {
        gap: 30px;
        margin: 40px 20px;
    }

    .form-image {
        width: 45%;
    }
}
@media (max-width: 768px) {

    .register-now-section {
        flex-direction: column;
        margin: 30px 16px;
        gap: 30px;
    }

    .form-image {
        width: 100%;
        height: 240px;
        order: -1; 
        border-radius: 16px;
    }

    .register-flat {
        width: 110%;
        padding: 24px;
    }

    .form-row {
        flex-direction: column;
        gap: 0;
    }

    .form-group {
        min-width: 100%;
    }
}
@media (max-width: 480px) {

    .form-image {
        height: 200px;
    }

    .register-flat h2.form-title {
        font-size: 20px;
    }

    button.submit-btn {
        font-size: 15px;
        padding: 12px;
    }
}



/* Checkbox custom style */
.checkbox-container {
    display: block;
    position: relative;
    padding-left: 30px;
    cursor: pointer;
    font-size: 14px;
    user-select: none;
}

.checkbox-container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
}

.checkbox-container .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 18px;
    width: 18px;
    background-color: #eee;
    border-radius: 4px;
}

.checkbox-container:hover input ~ .checkmark {
    background-color: #ccc;
}

.checkbox-container input:checked ~ .checkmark {
    background-color: #0ea5a4;
}

.checkbox-container .checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

.checkbox-container input:checked ~ .checkmark:after {
    display: block;
}

.checkbox-container .checkmark:after {
    left: 6px;
    top: 2px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}
</style>
