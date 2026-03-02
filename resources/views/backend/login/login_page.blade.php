<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/backend/signin.css') }}">
</head>

<body>
    {{--
    @if(isset($successMessage))
    <div class="signup-success-message">
        <h1>{{ $successMessage }}</h1>
    </div>
    @endif --}}
    <div class="container">

        <div class="form-container" >
            <h2>Login</h2>
            <form method="Post" action="{{ route('signin') }}">
                @csrf
                <input type="email" name="email" placeholder="Email">
                @error('email')
                    <span class="error-text">{{ $message }}</span><br>
                @enderror
                <input type="password" name="password" placeholder="Password">
                @error('password')
                    <span class="error-text">{{ $message }}</span> <br>
                @enderror
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
    @if(isset($successMessage))
        <div class="toast-message-success" id="toast-success">{{ $successMessage }}</div>
    @endif


    @if(isset($failMessage))
        <div class="toast-message-fail" id="toast-fail">{{ $failMessage }}</div>
    @endif

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const successToast = document.getElementById('toast-success');
            const failToast = document.getElementById('toast-fail');

            [successToast, failToast].forEach(toast => {
                if (toast) {
                    toast.classList.add('show');
                    setTimeout(() => {
                        toast.classList.remove('show');
                    }, 3000);
                }
            });
        });

        document.querySelectorAll("input").forEach(input => {
            input.addEventListener("input", () => {
                let errorElement = input.nextElementSibling;
                if (errorElement && errorElement.tagName === "SPAN") {
                    errorElement.style.display = "none";
                }
            });
        });

    </script>
</body>

</html>